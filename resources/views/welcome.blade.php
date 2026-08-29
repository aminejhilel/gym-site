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
                <a href="#about">About</a>
                <a href="#memberships">Memberships</a>
                <a href="#classes">Classes</a>
                <a href="#testimonials">Testimonials</a>
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

        <section id="about" class="section reveal" style="background: var(--bg-dark);">
            <div class="about-container">
                <div class="about-text">
                    <h2 class="section-title" style="text-align: left;">DISCOVER <span>ONYX GYM</span></h2>
                    <p>Welcome to Onyx Gym, where fitness meets excellence. We are more than just a gym; we are a community dedicated to helping you achieve your ultimate potential.</p>
                    <p>With top-tier equipment, expert trainers, and an inspiring atmosphere, we provide everything you need to transform your body and mind.</p>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Classes Weekly</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Access</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Expert Coaches</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop" alt="Gym Equipment" style="border-radius: 20px; width: 100%; box-shadow: 0 20px 40px rgba(0,0,0,0.4);">
                </div>
            </div>
        </section>

        <section id="memberships" class="section reveal">
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

        <section id="classes" class="section reveal" style="background: var(--bg-dark);">
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

        <section id="testimonials" class="section reveal">
            <h2 class="section-title">WHAT OUR <span>MEMBERS</span> SAY</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"Joining Onyx Gym was the best decision I've made for my health. The coaches are phenomenal and the community keeps me motivated."</p>
                    <div class="testimonial-author">- Sarah Jenkins</div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"The facilities are always clean, the equipment is top-notch, and the group classes are incredibly challenging but fun!"</p>
                    <div class="testimonial-author">- Michael Chen</div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">"I love the 24/7 access. It fits perfectly with my erratic work schedule. Highly recommend the personal training sessions."</p>
                    <div class="testimonial-author">- David Rodriguez</div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>ONYX GYM</h3>
                    <p>Push your limits. Redefine yourself.</p>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#memberships">Memberships</a>
                    <a href="#classes">Classes</a>
                </div>
                <div class="footer-contact">
                    <h4>Contact Us</h4>
                    <p>📍 123 Fitness Ave, NY</p>
                    <p>📞 (555) 123-4567</p>
                    <p>✉️ info@onyxgym.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Onyx Gym. All rights reserved.</p>
            </div>
        </footer>

        <script>
            // Scroll animations using Intersection Observer
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                        }
                    });
                }, { threshold: 0.1 });

                document.querySelectorAll('.reveal').forEach((el) => {
                    observer.observe(el);
                });
            });
        </script>
    </body>
</html>
