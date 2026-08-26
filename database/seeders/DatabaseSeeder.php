<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\Exercise;
use App\Models\Expense;
use App\Models\GymClass;
use App\Models\GymSetting;
use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipPlan;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gym.com',
            'password' => bcrypt('password'),
        ]);

        // Reference data
        $coaches = Coach::factory(8)->create();

        $plans = collect([
            MembershipPlan::create(['name' => 'Monthly', 'description' => 'Access for one month', 'duration_days' => 30, 'price' => 49.99, 'features' => ['Unlimited gym access', 'Locker room', 'Free WiFi'], 'is_active' => true]),
            MembershipPlan::create(['name' => 'Quarterly', 'description' => 'Best value for 3 months', 'duration_days' => 90, 'price' => 129.99, 'features' => ['Unlimited gym access', 'Locker room', 'Free WiFi', '1 guest pass/month'], 'is_active' => true]),
            MembershipPlan::create(['name' => 'Semi-Annual', 'description' => 'Six months commitment', 'duration_days' => 180, 'price' => 229.99, 'features' => ['Unlimited gym access', 'Locker room', 'Free WiFi', '2 guest passes/month', 'Free towel service'], 'is_active' => true]),
            MembershipPlan::create(['name' => 'Annual', 'description' => 'Best price per day', 'duration_days' => 365, 'price' => 399.99, 'features' => ['Unlimited gym access', 'Locker room', 'Free WiFi', 'Unlimited guest passes', 'Free towel service', 'Personal training session'], 'is_active' => true]),
        ]);

        $exercises = Exercise::factory(20)->create();
        $services = Service::factory(6)->create();
        $testimonials = Testimonial::factory(10)->create();

        // Training programs with exercises
        TrainingProgram::factory(6)->create(['coach_id' => $coaches->random()->id])->each(function ($program) use ($exercises) {
            $program->exercises()->attach(
                $exercises->random(5)->pluck('id'),
                ['sets' => 3, 'reps' => 10, 'order' => 1]
            );
        });

        // Gym classes
        GymClass::factory(15)->create(['coach_id' => $coaches->random()->id]);

        // Members with memberships, payments, invoices, attendances
        $members = Member::factory(40)->create();

        $members->each(function ($member) use ($plans) {
            $plan = $plans->random();
            $startDate = now()->subDays(rand(1, 300));
            $endDate = (clone $startDate)->addDays($plan->duration_days);

            /** @var Membership $membership */
            $membership = Membership::create([
                'member_id' => $member->id,
                'plan_id' => $plan->id,
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'status' => $endDate->isPast() ? 'expired' : 'active',
                'qr_code' => Str::uuid()->toString(),
            ]);

            $payment = Payment::create([
                'membership_id' => $membership->id,
                'member_id' => $member->id,
                'amount' => $plan->price,
                'payment_method' => fake()->randomElement(['cash', 'card', 'transfer']),
                'status' => 'paid',
                'paid_at' => $startDate,
            ]);

            Invoice::create([
                'payment_id' => $payment->id,
                'member_id' => $member->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
                'amount' => $plan->price,
                'issued_at' => $startDate,
                'due_at' => (clone $startDate)->addDays(7),
                'status' => 'paid',
            ]);

            // Attendances
            $attendanceCount = rand(0, 20);
            for ($i = 0; $i < $attendanceCount; $i++) {
                $checkin = fake()->dateTimeBetween($startDate, min($endDate, now()));
                \App\Models\Attendance::create([
                    'member_id' => $member->id,
                    'membership_id' => $membership->id,
                    'checked_in_at' => $checkin,
                    'checked_out_at' => fake()->optional(0.8)->dateTimeBetween($checkin, (clone $checkin)->modify('+3 hours')),
                    'method' => fake()->randomElement(['qr', 'manual']),
                ]);
            }
        });

        // Reservations for gym classes
        $gymClasses = GymClass::all();
        $members->random(20)->each(function ($member) use ($gymClasses) {
            $gymClasses->random(rand(1, 3))->each(function ($class) use ($member) {
                Reservation::firstOrCreate([
                    'member_id' => $member->id,
                    'gym_class_id' => $class->id,
                ], [
                    'reserved_at' => now()->subDays(rand(0, 30)),
                    'status' => fake()->randomElement(['reserved', 'attended', 'cancelled']),
                ]);
            });
        });

        // Expenses
        Expense::factory(30)->create();

        // Gym settings
        $settings = [
            ['key' => 'gym_name', 'value' => 'FitZone Gym', 'type' => 'text', 'label' => 'Gym Name'],
            ['key' => 'gym_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'label' => 'Phone'],
            ['key' => 'gym_email', 'value' => 'info@fitzone.com', 'type' => 'text', 'label' => 'Email'],
            ['key' => 'gym_address', 'value' => '123 Fitness Blvd, Sport City', 'type' => 'text', 'label' => 'Address'],
            ['key' => 'gym_opening_hours', 'value' => 'Mon-Fri: 6am-10pm | Sat-Sun: 8am-8pm', 'type' => 'text', 'label' => 'Opening Hours'],
            ['key' => 'currency', 'value' => 'USD', 'type' => 'text', 'label' => 'Currency'],
        ];

        foreach ($settings as $setting) {
            GymSetting::create($setting);
        }
    }
}
