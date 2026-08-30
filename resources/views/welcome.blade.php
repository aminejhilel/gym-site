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
            <div class="nav-top">
                <div class="nav-socials">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.036 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg></a>
                </div>
                <a href="#" class="nav-brand">PASSAGE FITNESS</a>
                <div class="nav-utils">
                    <a href="#">Notre mission</a>
                    <a href="#">Contact</a>
                    <a href="#">FR <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" style="display:inline-block;margin-left:2px;"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg></a>
                </div>
            </div>
            <div class="nav-links">
                <a href="#home">Accueil</a>
                <a href="#about">Clubs</a>
                <a href="#classes" class="active">Activités</a>
                <a href="#memberships">Entraînement personnel</a>
                <a href="#">Care'in</a>
                <a href="#">Events</a>
            </div>
        </nav>

        <section id="home" class="hero">
            <img src="{{ asset('images/hero-bg-2.jpg') }}" alt="Indoor Cycling Class" class="hero-bg">
            <div class="hero-overlay"></div>
            
            <div class="hero-content">
                <div class="hero-subtitle">INSPIRANTES & MOTIVANTES</div>
                <h1>Activités</h1>
            </div>
            
            <a href="#about" class="hero-explore">
                EXPLORER
                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg></span>
            </a>
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
