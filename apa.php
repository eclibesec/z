<?php
header("HTTP/1.0 200 ok");

if (isset($_GET['x46'])) {
    $filename = "list.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET['x46']);
    foreach ($lines as $item) {
        if (strtolower($item) === $target_string) {
            $BRAND = strtoupper($target_string);
        }
    }
    if (isset($BRAND)) {
        $BRANDS = $BRAND;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (isset($fullUrl)) {
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $urlPath = $baseUrl;
        } else {
            echo "URL saat ini tidak didefinisikan.";
        }
    } else {
        echo "<h1>APA?? MAU MARAH KAU?</h1>";
        echo "LAYANAN SEDANG MAINTENANCE.";
        exit();
    }
} else {
    echo "<h1>APA?? MAU MARAH KAU?</h1>";
    echo "LAYANAN SEDANG MAINTENANCE.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> - Layanan OTP Termurah Rp 5.000 dan Terpercaya di Indonesia</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> terpercaya dengan harga termurah Rp 5.000. Dapatkan kode OTP untuk verifikasi WhatsApp, Telegram, Facebook, Instagram, dan marketplace dengan proses instan. Rating 5.0 ⭐⭐⭐⭐⭐ (9.899.778 ulasan)">
    <meta name="keywords" content="<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?>, layanan OTP, OTP murah, verifikasi OTP, kode OTP, OTP WhatsApp, OTP Telegram, OTP Facebook, OTP Instagram, OTP marketplace, jasa OTP, nomor virtual, verifikasi akun">
    <meta name="author" content="<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo isset($urlPath) ? $urlPath : ''; ?>">
    <meta property="og:title" content="<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> - Layanan OTP Termurah Rp 5.000 dan Terpercaya di Indonesia">
    <meta property="og:description" content="Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> terpercaya dengan harga termurah Rp 5.000. Dapatkan kode OTP untuk verifikasi WhatsApp, Telegram, Facebook, Instagram, dan marketplace dengan proses instan. Rating 5.0 ⭐⭐⭐⭐⭐ (9.899.778 ulasan)">
    <meta property="og:image" content="<?php echo isset($urlPath) ? dirname($urlPath) : ''; ?>/otp-image.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo isset($urlPath) ? $urlPath : ''; ?>">
    <meta property="twitter:title" content="<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> - Layanan OTP Termurah Rp 5.000 dan Terpercaya di Indonesia">
    <meta property="twitter:description" content="Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> terpercaya dengan harga termurah Rp 5.000. Dapatkan kode OTP untuk verifikasi WhatsApp, Telegram, Facebook, Instagram, dan marketplace dengan proses instan. Rating 5.0 ⭐⭐⭐⭐⭐ (9.899.778 ulasan)">
    <meta property="twitter:image" content="<?php echo isset($urlPath) ? dirname($urlPath) : ''; ?>/otp-image.jpg">
    
    <!-- Canonical Link -->
    <link rel="canonical" href="<?php echo isset($urlPath) ? $urlPath : ''; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
    
    <!-- Structured Data for Google -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": "<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?>",
      "image": "<?php echo isset($urlPath) ? dirname($urlPath) : ''; ?>/otp-image.jpg",
      "description": "Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> terpercaya dengan harga termurah. Dapatkan kode OTP untuk verifikasi WhatsApp, Telegram, Facebook, Instagram, dan marketplace dengan proses instan.",
      "brand": {
        "@type": "Brand",
        "name": "<?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?>"
      },
      "offers": {
        "@type": "Offer",
        "url": "<?php echo isset($urlPath) ? $urlPath : ''; ?>",
        "priceCurrency": "IDR",
        "price": "5000",
        "priceValidUntil": "<?php echo date('Y-12-31'); ?>",
        "availability": "https://schema.org/InStock"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5.0",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "9899778"
      }
    }
    </script>
    
    <style>
        :root {
            --primary: #25D366;
            --primary-dark: #128C7E;
            --secondary: #f97316;
            --text: #1e293b;
            --text-light: #64748b;
            --background: #ffffff;
            --background-alt: #f8fafc;
            --border: #e2e8f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            line-height: 1.6;
            color: var(--text);
            background-color: var(--background);
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        header {
            background-color: var(--background);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-links a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.2s;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--secondary);
        }
        
        .btn-secondary:hover {
            background-color: #ea580c;
        }
        
        .hero {
            padding: 5rem 0;
            background-color: var(--background-alt);
        }
        
        .hero-content {
            display: flex;
            align-items: center;
            gap: 3rem;
        }
        
        .hero-text {
            flex: 1;
        }
        
        .hero-image {
            flex: 1;
            text-align: center;
        }
        
        .hero-image svg {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.1));
        }
        
        h1 {
            font-size: 2.5rem;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: var(--text);
        }
        
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--text);
        }
        
        h3 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            color: var(--text);
        }
        
        p {
            margin-bottom: 1.5rem;
            color: var(--text-light);
        }
        
        .features {
            padding: 5rem 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background-color: var(--background);
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .testimonials {
            padding: 5rem 0;
            background-color: var(--background-alt);
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background-color: var(--background);
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
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
            font-weight: bold;
            font-size: 1.25rem;
        }
        
        .author-info h4 {
            margin: 0;
            font-size: 1rem;
        }
        
        .author-info p {
            margin: 0;
            font-size: 0.875rem;
            color: var(--text-light);
        }
        
        .cta {
            padding: 5rem 0;
            background-color: var(--primary);
            color: white;
            text-align: center;
        }
        
        .cta h2 {
            color: white;
        }
        
        .cta p {
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .cta .btn {
            background-color: white;
            color: var(--primary);
        }
        
        .cta .btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        footer {
            background-color: var(--text);
            color: white;
            padding: 3rem 0;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        
        .footer-column h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
        }
        
        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .stars {
            color: #FFD700;
            font-size: 1.25rem;
            margin-right: 0.5rem;
        }
        
        .review-count {
            color: var(--text-light);
            font-size: 0.875rem;
        }
        
        .price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
            }
            
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            h2 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="https://wa.me/85581308825?text=.menu" class="logo"><?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?></a>
                <nav>
                    <div class="nav-links">
                        <a href="#features">Fitur</a>
                        <a href="#testimonials">Testimoni</a>
                        <a href="#contact">Kontak</a>
                    </div>
                </nav>
                <a href="https://wa.me/85581308825?text=.menu" class="btn">Daftar Sekarang</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> Termurah dan Terpercaya</h1>
                    <div class="rating">
                        <div class="stars">★★★★★</div>
                        <div class="review-count">(9.899.778 ulasan)</div>
                    </div>
                    <div class="price">Rp 5.000</div>
                    <p>Dapatkan kode OTP untuk verifikasi akun media sosial, marketplace, dan aplikasi lainnya dengan harga terjangkau dan proses instan.</p>
                    <a href="https://wa.me/85581308825?text=.menu" class="btn">Daftar Sekarang</a>
                    <a href="https://wa.me/85581308825?text=.menu" class="btn btn-secondary">Hubungi Kami</a>
                </div>
                <div class="hero-image">
                    <svg width="500" height="400" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                        <!-- Phone outline -->
                        <rect x="150" y="50" width="200" height="300" rx="20" fill="#ffffff" stroke="#25D366" stroke-width="8"/>
                        
                        <!-- Phone screen -->
                        <rect x="165" y="80" width="170" height="240" rx="5" fill="#f0f0f0"/>
                        
                        <!-- OTP message bubbles -->
                        <rect x="180" y="100" width="140" height="40" rx="10" fill="#e1f5fe"/>
                        <rect x="180" y="150" width="140" height="40" rx="10" fill="#e1f5fe"/>
                        
                        <!-- OTP code highlight -->
                        <rect x="200" y="200" width="100" height="50" rx="5" fill="#25D366"/>
                        <text x="250" y="230" font-family="Arial" font-size="20" fill="white" text-anchor="middle">123456</text>
                        
                        <!-- WhatsApp logo -->
                        <circle cx="250" cy="300" r="20" fill="#25D366"/>
                        <path d="M260,300 C260,305.5 255.5,310 250,310 C244.5,310 240,305.5 240,300 C240,294.5 244.5,290 250,290 C255.5,290 260,294.5 260,300 Z" fill="white"/>
                        <path d="M255,297 L251,301 L248,298" stroke="white" stroke-width="2" fill="none"/>
                        
                        <!-- Decorative elements -->
                        <circle cx="120" cy="150" r="30" fill="#25D366" opacity="0.2"/>
                        <circle cx="380" cy="250" r="40" fill="#25D366" opacity="0.2"/>
                        <circle cx="150" cy="350" r="25" fill="#25D366" opacity="0.2"/>
                        <circle cx="350" cy="100" r="20" fill="#25D366" opacity="0.2"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="section-header">
                <h2>Keunggulan Layanan Kami</h2>
                <p>Mengapa harus memilih layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> dari kami?</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Proses Instan</h3>
                    <p>Dapatkan kode OTP dalam hitungan detik tanpa perlu menunggu lama.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Harga Termurah</h3>
                    <p>Kami menawarkan harga paling kompetitif mulai dari Rp 5.000 dengan kualitas terbaik.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Keamanan Terjamin</h3>
                    <p>Sistem kami menggunakan enkripsi tingkat tinggi untuk menjaga keamanan data Anda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌐</div>
                    <h3>Support Multi Platform</h3>
                    <p>Mendukung berbagai platform populer seperti WhatsApp, Telegram, Facebook, dan lainnya.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔄</div>
                    <h3>Auto Refill</h3>
                    <p>Sistem pengisian otomatis saat saldo Anda hampir habis (opsional).</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛠️</div>
                    <h3>API Tersedia</h3>
                    <p>Integrasi mudah dengan sistem Anda melalui API yang kami sediakan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Testimoni Pelanggan</h2>
                <p>Apa kata pelanggan tentang layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> kami</p>
                <div class="rating" style="justify-content: center; margin-top: 1rem;">
                    <div class="stars">★★★★★</div>
                    <div class="review-count">5.0 (9.899.778 ulasan)</div>
                </div>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"Layanan OTP tercepat yang pernah saya gunakan. Proses verifikasi jadi sangat mudah dan tidak ada masalah sama sekali."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">BS</div>
                        <div class="author-info">
                            <h4>Budi Santoso</h4>
                            <p>Pengusaha Online</p>
                        </div>
                    </div>
                    <div class="stars" style="margin-top: 1rem; font-size: 1rem;">★★★★★</div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"Harga sangat terjangkau dibandingkan provider lain. Saya sudah berlangganan selama 6 bulan dan belum pernah mengalami masalah."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SR</div>
                        <div class="author-info">
                            <h4>Siti Rahayu</h4>
                            <p>Digital Marketer</p>
                        </div>
                    </div>
                    <div class="stars" style="margin-top: 1rem; font-size: 1rem;">★★★★★</div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"API yang disediakan sangat mudah diintegrasikan dengan sistem kami. Sangat membantu untuk otomatisasi proses verifikasi pelanggan."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AF</div>
                        <div class="author-info">
                            <h4>Ahmad Fauzi</h4>
                            <p>CTO Startup</p>
                        </div>
                    </div>
                    <div class="stars" style="margin-top: 1rem; font-size: 1rem;">★★★★★</div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>Mulai Gunakan Layanan <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?> Kami Sekarang</h2>
            <p>Daftar dalam hitungan menit dan nikmati kemudahan verifikasi dengan layanan OTP terbaik di Indonesia. Hanya Rp 5.000!</p>
            <a href="https://wa.me/85581308825?text=.menu" class="btn">Daftar Sekarang</a>
        </div>
    </section>

    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3><?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?></h3>
                    <p>Penyedia layanan OTP terpercaya dengan harga terjangkau dan kualitas terbaik di Indonesia.</p>
                    <div class="rating" style="margin-top: 1rem;">
                        <div class="stars">★★★★★</div>
                        <div class="review-count" style="color: rgba(255, 255, 255, 0.7);">5.0 (9.899.778 ulasan)</div>
                    </div>
                    <div style="color: white; font-weight: bold; margin-top: 0.5rem;">Rp 5.000</div>
                </div>
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul class="footer-links">
                        <li><a href="https://wa.me/85581308825?text=.menu">OTP WhatsApp</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">OTP Telegram</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">OTP Facebook</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">OTP Instagram</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">OTP Marketplace</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Perusahaan</h3>
                    <ul class="footer-links">
                        <li><a href="https://wa.me/85581308825?text=.menu">Tentang Kami</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">Karir</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">Blog</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">Kebijakan Privasi</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <ul class="footer-links">
                        <li><a href="https://wa.me/85581308825?text=.menu">WhatsApp</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">Telegram</a></li>
                        <li><a href="https://wa.me/85581308825?text=.menu">+855 81 308 825</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo isset($BRANDS) ? $BRANDS : 'OTP Murah'; ?>. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
