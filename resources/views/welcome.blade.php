<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPOBKU.COM</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Internal CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            overflow-x: hidden;
            /* Disable horizontal scroll */
        }

        .header {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
            color: #fff;
        }

        .header .contact-info {
            font-size: 14px;
        }

        .header .contact-info i {
            margin-right: 5px;
        }

        .navbar {
            background-color: #444;
            padding: 10px 0;
            text-align: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .navbar a.active {
            border-bottom: 2px solid #fff;
        }

        .navbar .auth-buttons {
            float: right;
            margin-right: 20px;
        }

        .navbar .auth-buttons a {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #ff4b5c;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .section.hero {
            background-color: #555;
            color: #fff;
            text-align: center;
        }

        .section.hero h1 {
            margin: 0;
            font-size: 36px;
        }

        .section.hero p {
            margin: 10px 0 0;
            font-size: 18px;
        }

        .section.services {
            background-color: #fff;
            text-align: center;
        }

        .section.services h2 {
            color: #333;
            font-size: 24px;
        }

        .section.services p {
            color: #666;
            font-size: 16px;
            margin: 20px 0;
        }

        .section.services ul {
            list-style: none;
            padding: 0;
        }

        .section.services ul li {
            color: #333;
            font-size: 16px;
            margin: 10px 0;
        }

        .section.services ul li i {
            color: #ff4b5c;
            margin-right: 10px;
        }

        .section.why-us {
            display: flex;
            flex-direction: row;
            background-color: #f0f0f0;
        }

        .section.why-us .image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section.why-us .image img {
            max-width: 100%;
            height: auto;
        }

        .section.why-us .content {
            flex: 1;
            padding: 0 20px;
        }

        .section.why-us .content h2 {
            color: #333;
            font-size: 24px;
        }

        .section.why-us .content .accordion {
            margin-top: 20px;
        }

        .section.why-us .content .accordion .accordion-item {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .section.why-us .content .accordion .accordion-item h3 {
            margin: 0;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            background-color: #f0f0f0;
        }

        .section.why-us .content .accordion .accordion-item p {
            margin: 0;
            padding: 15px;
            display: none;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        .footer .contact-button {
            background-color: #ff4b5c;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="contact-info">
            <i class="fas fa-envelope"></i> support@PPOBKU.COM |
            <i class="fas fa-phone"></i> 0895405074429
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <a class="active" href="#">Beranda</a>
        <a href="#">Riwayat Transaksi</a>
        <a href="#">Produk</a>
        <a href="#">Order</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
        <div class="auth-buttons">
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="section hero">
        <div>
            <h1>Layanan</h1>
            <p>Nikmati kemudahan bertransaksi produk digital yang terjangkau dari PPOBKU.COM. Kami menyediakan berbagai macam produk digital.</p>
        </div>
    </div>

    <!-- Services Section -->
    <div class="section services">
        <div>
            <h2>DAPATKAN LAYANAN YANG MEMUDAHKAN UNTUK KAMU DAN PELANGGANMU!</h2>
            <p>Di PPOBKU.COM, kami menghadirkan solusi sederhana untuk kebutuhan sehari-hari Anda. Sebagai penyedia layanan produk digital online, kami memiliki komitmen untuk menyediakan layanan yang mudah, cepat, dan terpercaya bagi pelanggan kami.</p>
            <ul>
                <li><i class="fas fa-check"></i> Transaksi cepat tanpa macet</li>
                <li><i class="fas fa-check"></i> Menawarkan harga produk digital yang bersaing dan terjangkau.</li>
                <li><i class="fas fa-check"></i> Memberikan layanan pelanggan yang ramah dan responsif.</li>
            </ul>
        </div>
    </div>

    <!-- Why Us Section -->
    <div class="section why-us">
        <div class="image">
            <img src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-LmQ09WWGIGwOeeA4ArnRw0x5/user-uJPET5fjNenSso8wCETWVNOp/img-VO3zMJGzdwf1ucQSf3B8g8lV.png?st=2024-09-19T02%3A31%3A35Z&se=2024-09-19T04%3A31%3A35Z&sp=r&sv=2024-08-04&sr=b&rscd=inline&rsct=image/png&skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2024-09-19T01%3A59%3A45Z&ske=2024-09-20T01%3A59%3A45Z&sks=b&skv=2024-08-04&sig=gBCYpoyNPGh0BwT98jPkuI7%2BkmC2mq3HpyJ6pBmrfsU%3D" alt="PPOBKU.COM logo and digital transaction illustration">
        </div>
        <div class="content">
            <h2>MENGAPA KAMI?</h2>
            <div class="accordion">
                <div class="accordion-item">
                    <h3>01 Transparansi Harga</h3>
                    <p>Harga dari kami semuanya transparan.</p>
                </div>
                <div class="accordion-item">
                    <h3>02 Keamanan Transaksi</h3>
                    <p>Transaksi yang dilakukan melalui sistem kami dijamin aman dan terpercaya.</p>
                </div>
                <div class="accordion-item">
                    <h3>03 Dukungan Pelanggan</h3>
                    <p>Kami menyediakan dukungan pelanggan 24/7 untuk memastikan kepuasan Anda.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 PPOBKU.COM. All rights reserved.</p>
        <a href="#" class="contact-button">Hubungi Kami</a>
    </div>

    <!-- Internal JavaScript -->
    <script>
        // Toggle accordion content
        document.querySelectorAll('.accordion-item h3').forEach(item => {
            item.addEventListener('click', () => {
                const content = item.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>

</html>