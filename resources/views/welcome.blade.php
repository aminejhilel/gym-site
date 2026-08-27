<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Gym Site') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav class="navbar">
            <a href="#" class="nav-brand">ONYX GYM</a>
            <div class="nav-links">
                <a href="#home">Home</a>
                <a href="#memberships">Memberships</a>
                <a href="#classes">Classes</a>
            </div>
            <a href="{{ url('/admin') }}" class="btn-login">Member Login</a>
        </nav>

        <section id="home" class="hero">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="Gym Interior" class="hero-bg">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>PUSH YOUR LIMITS.<br>REDEFINE YOURSELF.</h1>
                <p>Join the most exclusive fitness experience in the city. State-of-the-art equipment, elite coaching, and a community that pushes you forward.</p>
                <a href="#memberships" class="btn-primary">Start Your Journey</a>
            </div>
        </section>

        <section id="memberships" class="section">
            <h2 class="section-title">CHOOSE YOUR <span>PLAN</span></h2>
            <div class="plans-grid">
                @foreach ($plans as $plan)
                    <div class="plan-card">
                        <h3 class="plan-name">{{ $plan->name }}</h3>
                        <div class="plan-price">${{ number_format($plan->price, 2) }}<span>/ {{ $plan->duration_days }} days</span></div>
                        <ul class="plan-features">
                            @if($plan->features)
                                @foreach($plan->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            @endif
                        </ul>
                        <a href="{{ url('/admin') }}" class="btn-primary" style="width: 100%; padding: 0.8rem;">Join Now</a>
                    </div>
                @endforeach
            </div>
        </section>

        <section id="classes" class="section" style="background: var(--bg-dark);">
            <h2 class="section-title">UPCOMING <span>CLASSES</span></h2>
            <div class="classes-grid">
                @foreach ($classes as $gymClass)
                    <div class="class-card">
                        <h3 class="class-name">{{ $gymClass->name }}</h3>
                        <div class="class-coach">Coach: {{ $gymClass->coach->first_name ?? 'TBA' }}</div>
                        <div class="class-meta">
                            <span>🕒 {{ \Carbon\Carbon::parse($gymClass->scheduled_at)->format('M d, H:i') }}</span>
                            <span>⏱️ {{ $gymClass->duration_minutes }} min</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <footer>
            <p>&copy; {{ date('Y') }} Onyx Gym. All rights reserved.</p>
        </footer>
    </body>
</html>
