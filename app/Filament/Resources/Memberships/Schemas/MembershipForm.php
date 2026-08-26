<?php

namespace App\Filament\Resources\Memberships\Schemas;

use App\Models\Member;
use App\Models\MembershipPlan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MembershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Membership Details')
                    ->schema([
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('plan_id')
                            ->label('Plan')
                            ->relationship('plan', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $plan = MembershipPlan::find($state);
                                    $start = now();
                                    $set('start_date', $start->format('Y-m-d'));
                                    $set('end_date', $start->addDays($plan->duration_days)->format('Y-m-d'));
                                }
                            }),
                        DatePicker::make('start_date')->required(),
                        DatePicker::make('end_date')->required(),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'expired' => 'Expired',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('active')
                            ->required(),
                        TextInput::make('qr_code')
                            ->default(fn () => Str::uuid()->toString())
                            ->disabled()
                            ->dehydrated()
                            ->label('QR Code'),
                    ])->columns(2),
            ]);
    }
}
