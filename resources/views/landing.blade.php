<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICLEAN - Laundry Online Professional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --secondary: #f97316;
            --accent: #f59e0b;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --success: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header & Navigation */
        header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }
        
        .logo-icon {
            font-size: 32px;
            color: #ffd700;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 5px;
        }
        
        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .login-btn {
            background-color: white;
            color: var(--primary) !important;
            padding: 10px 20px !important;
            border-radius: 30px;
            font-weight: 600 !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .login-btn:hover {
            background-color: #f0f9ff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(14, 165, 233, 0.9), rgba(2, 132, 199, 0.9)), url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
            border-radius: 0 0 20px 20px;
            margin-bottom: 60px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: var(--secondary);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .cta-btn.outline {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
            background-color: var(--accent);
        }
        
        .cta-btn.outline:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        /* Features Section */
        .features {
            padding: 40px 0 80px;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--primary-dark);
            font-size: 2.5rem;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary);
            margin: 15px auto;
            border-radius: 2px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        .feature-icon {
            font-size: 50px;
            color: var(--primary);
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--primary-dark);
        }
        
        .feature-card p {
            color: var(--gray);
        }
        
        /* How It Works Section */
        .how-it-works {
            background-color: var(--primary-dark);
            color: white;
            padding: 80px 0;
            border-radius: 20px;
            margin-bottom: 60px;
        }
        
        .steps {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 50px;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 250px;
        }
        
        .step-number {
            background-color: white;
            color: var(--primary);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .step h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }
        
        .step p {
            color: #e2e8f0;
        }
        
        /* Pricing Section */
        .pricing {
            padding: 40px 0 80px;
        }
        
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .pricing-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .pricing-card.popular {
            border: 2px solid var(--primary);
            transform: scale(1.05);
        }
        
        .pricing-card.popular::before {
            content: 'PALING POPULER';
            position: absolute;
            top: 15px;
            right: -30px;
            background: var(--primary);
            color: white;
            padding: 5px 30px;
            font-size: 12px;
            font-weight: 600;
            transform: rotate(45deg);
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        .pricing-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--primary-dark);
        }
        
        .price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .price span {
            font-size: 1rem;
            color: var(--gray);
        }
        
        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }
        
        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
            color: var(--gray);
        }
        
        .pricing-features li:last-child {
            border-bottom: none;
        }
        
        .pricing-btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        .pricing-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(14, 165, 233, 0.3);
        }
        
        /* Testimonials */
        .testimonials {
            background-color: #f1f5f9;
            padding: 80px 0;
            border-radius: 20px;
            margin-bottom: 60px;
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            position: relative;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--gray);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .author-details h4 {
            color: var(--primary-dark);
            margin-bottom: 5px;
        }
        
        .author-details p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--accent);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            color: white;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #1e293b;
            color: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-links {
                gap: 15px;
            }
            
            .logo-text {
                font-size: 22px;
            }
            
            .steps {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .hero {
                padding: 60px 20px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <span class="logo-icon"><i class="fas fa-tshirt"></i></span>
                    <span class="logo-text">SICLEAN</span>
                </div>
                <div class="nav-links">
                    <a href="#"><i class="fas fa-home"></i> Beranda</a>
                    <a href="#layanan"><i class="fas fa-concierge-bell"></i> Layanan</a>
                    <a href="#harga"><i class="fas fa-tag"></i> Harga</a>
                    <a href="#tentang"><i class="fas fa-info-circle"></i> Tentang</a>
                    <a href="/login" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Laundry Kiloan Online? SICLEAN Aja!</h1>
                <p>Kami hadir untuk memudahkan hidup Anda. Cuci, setrika, dan pengeringan pakaian dengan hasil maksimal tanpa perlu keluar rumah.</p>
                <div class="cta-buttons">
                    <a href="#pesan" class="cta-btn"><i class="fas fa-calendar-check"></i> Pesan Sekarang</a>
                    <a href="#layanan" class="cta-btn outline"><i class="fas fa-info-circle"></i> Lihat Layanan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="layanan">
        <div class="container">
            <h2 class="section-title">Layanan Kami</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Cuci Setrika</h3>
                    <p>Layanan lengkap cuci, kering, dan setrika dengan hasil rapi dan wangi.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wind"></i>
                    </div>
                    <h3>Cuci Kering</h3>
                    <p>Cuci dan pengeringan tanpa setrika untuk pakaian casual Anda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-soap"></i>
                    </div>
                    <h3>Setrika Saja</h3>
                    <p>Untuk Anda yang hanya perlu menyetrika pakaian yang sudah kering.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3>Layanan Khusus</h3>
                    <p>Layanan khusus untuk selimut, bed cover, dan barang besar lainnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title" style="color: white;">Cara Kerja SICLEAN</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Pesan Online</h3>
                    <p>Pesan layanan melalui website atau aplikasi kami</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Proses Laundry</h3>
                    <p>Laundry diproses secara profesional</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Antar & Bayar</h3>
                    <p>Laundry diantar kembali dan bayar dengan mudah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="harga">
        <div class="container">
            <h2 class="section-title">Paket Harga</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Cuci Kering</h3>
                    <div class="price">Rp 5.000<span>/kg</span></div>
                    <ul class="pricing-features">
                        <li>Cuci bersih dengan deterjen berkualitas</li>
                        <li>Pengeringan dengan mesin dryer</li>
                        <li>Tidak termasuk setrika</li>
                        <li>Minimal order 3 kg</li>
                    </ul>
                    <a href="#pesan" class="pricing-btn">Pesan Sekarang</a>
                </div>
                <div class="pricing-card popular">
                    <h3>Cuci Setrika</h3>
                    <div class="price">Rp 7.000<span>/kg</span></div>
                    <ul class="pricing-features">
                        <li>Cuci bersih dengan deterjen berkualitas</li>
                        <li>Pengeringan dengan mesin dryer</li>
                        <li>Setrika rapi dan wangi</li>
                        <li>Gratis antar-jemput</li>
                        <li>Minimal order 3 kg</li>
                    </ul>
                    <a href="#pesan" class="pricing-btn">Pesan Sekarang</a>
                </div>
                <div class="pricing-card">
                    <h3>Setrika Saja</h3>
                    <div class="price">Rp 4.000<span>/kg</span></div>
                    <ul class="pricing-features">
                        <li>Setrika rapi dan wangi</li>
                        <li>Dilipat dengan rapi</li>
                        <li>Gratis plastik packaging</li>
                        <li>Minimal order 3 kg</li>
                    </ul>
                    <a href="#pesan" class="pricing-btn">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Apa Kata Pelanggan Kami?</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"Pelayanan SICLEAN sangat memuaskan! Pakaian saya selalu bersih, wangi, dan rapi. Pengiriman juga tepat waktu."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">R</div>
                        <div class="author-details">
                            <h4>Utin</h4>
                            <p>Pelanggan Setia</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"Pelayanan SICLEAN sangat memuaskan! Pakaian saya selalu bersih, wangi, dan rapi. Pengiriman juga tepat waktu."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">R</div>
                        <div class="author-details">
                            <h4>Aceng</h4>
                            <p>Pelanggan Tetap</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"SICLEAN sangat membantu. Sekarang tidak perlu lagi weekend habis untuk laundry."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">A</div>
                        <div class="author-details">
                            <h4>Ujang</h4>
                            <p>Karyawan Swasta</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"Harganya terjangkau, kualitasnya premium. Recommended banget buat yang mau laundry tanpa ribet!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">D</div>
                        <div class="author-details">
                            <h4>Siti</h4>
                            <p>Ibu Rumah Tangga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>SICLEAN</h3>
                    <p>Layanan laundry online profesional yang mengutamakan kualitas, kecepatan, dan kepuasan pelanggan.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/@fallmonarch"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Cuci Setrika</a></li>
                        <li><a href="#">Cuci Kering</a></li>
                        <li><a href="#">Setrika Saja</a></li>
                        <li><a href="#">Layanan Khusus</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Link Penting</h3>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Jakarta</li>
                        <li><i class="fas fa-phone"></i> +62 812-3456-7890</li>
                        <li><i class="fas fa-envelope"></i> abay@siclean.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 SICLEAN. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animasi untuk elemen saat di-scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.feature-card, .pricing-card, .testimonial-card, .step');
            
            function checkScroll() {
                animatedElements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if (elementPosition < screenPosition) {
                        element.style.opacity = 1;
                        element.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Set initial state for animation
            animatedElements.forEach(element => {
                element.style.opacity = 0;
                element.style.transform = 'translateY(50px)';
                element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            
            window.addEventListener('scroll', checkScroll);
            checkScroll(); // Check on initial load
            
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>