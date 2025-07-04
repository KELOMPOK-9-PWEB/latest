<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM UAD</title>
    <style>
        /* ==== RESET & UTIL ==== */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            color: #333;
            line-height: 1.5;
            background: #f9fafb;
            padding-top: 80px;
        }

        /* ==== HERO SLIDER ==== */
        .hero {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        .slides img {
            flex: 0 0 100%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .nav-btns {
            position: absolute;
            top: 45%;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
        }
        .nav-btns button {
            background: rgba(0,0,0,.45);
            border: 0;
            color: #fff;
            font-size: 28px;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        .nav-btns button:hover {
            background: rgba(0,0,0,.65);
        }

        /* ==== CONTAINER ==== */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1, h2, h3 {
            color: #003366;
            margin-bottom: 10px;
        }

        h2.section-title {
            margin-top: 40px;
            text-align: center;
        }

        /* ==== GRID UKM ==== */
        .ukm-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }

        .ukm {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            text-align: center;
            width: 100%;
            max-width: 280px;
        }

        .ukm-img {
            width: 100%;
            height: 180px;
            border-radius: 8px;
            overflow: hidden;
        }

        .ukm-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .ukm-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-height: 160px;
        }

        .ukm-info p {
            font-size: .92rem;
            line-height: 1.4;
            text-align: justify;
        }

        /* ==== TEAM SECTION ==== */
        .team-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 30px;
            margin: 60px 0;
        }

        .team-section img {
            width: 100%;
            max-width: 460px;
            border-radius: 10px;
            flex: 1 1 300px;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0,0,0,.08);
        }

        .team-text {
            flex: 1 1 300px;
        }

        .team-text p {
            text-align: justify;
        }
    </style>
</head>
<body>

    <!-- HERO -->
    <div class="hero">
        <div class="slides" id="slideContainer">
            <img src="ganteng.png" alt="Mahasiswa UAD">
            <img src="musik.png" alt="UKM Musik UAD">
            <img src="tari.png" alt="UKM Tari UAD">
        </div>
        <div class="nav-btns">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <!-- SEKILAS UKM -->
    <div class="container">
        <h2 class="section-title">SEKILAS UKM</h2>

        <!-- GRID UKM -->
        <div class="ukm-grid">
            <div class="ukm">
                <div class="ukm-img"><img src="basket2.jpg" alt="UKM Basket UAD"></div>
                <div class="ukm-info">
                    <h3>UKM Basket</h3>
                    <p>Bukan sekadar bermain, di sini kamu temukan keluarga kedua! Rasakan adrenalin, bangun kekompakan, dan ukir prestasimu di lapangan.</p>
                </div>
            </div>
            <div class="ukm">
                <div class="ukm-img"><img src="musik2.jpg" alt="UKM Musik UAD"></div>
                <div class="ukm-info">
                    <h3>UKM Musik</h3>
                    <p>Punya melodi di hati? UKM Musik adalah panggungmu! Eksplorasi genre, berkolaborasi, dan suarakan passion‑mu.</p>
                </div>
            </div>
            <div class="ukm">
                <div class="ukm-img"><img src="tari2.jpg" alt="UKM Tari UAD"></div>
                <div class="ukm-info">
                    <h3>UKM Tari</h3>
                    <p>Ekspresikan diri lewat gerakan! UKM Tari mengajakmu melestarikan budaya dan mengeksplorasi gaya modern.</p>
                </div>
            </div>
        </div>

        <!-- TEAM SECTION -->
        <div class="team-section">
            <img src="basket.4" alt="Tim UKM UAD">
            <div class="team-text">
                <h2>Tim Kami</h2>
                <p>Kami adalah gabungan mahasiswa multitalenta yang berkomitmen untuk membangun iklim kreatif, sportif, dan kolaboratif di Universitas Ahmad Dahlan. Bersama‑sama, kami menghadirkan kegiatan, pelatihan, dan kompetisi yang memperkaya pengalaman kampus sekaligus memupuk jiwa kepemimpinan dan solidaritas.</p>
                <p>Melalui dukungan para mentor dan semangat gotong royong, kami yakin setiap mahasiswa dapat menemukan ruang berekspresi dan berkembang. Mari bergabung dan menjadi bagian dari perjalanan inspiratif ini!</p>
            </div>
        </div>
    </div>

    <script>
        // HERO SLIDER
        let idx = 0;
        const cont = document.getElementById('slideContainer');
        const total = cont.children.length;
        function show(n) {
            cont.style.transform = `translateX(${-n * 100}%)`;
        }
        function nextSlide() {
            idx = (idx + 1) % total;
            show(idx);
        }
        function prevSlide() {
            idx = (idx - 1 + total) % total;
            show(idx);
        }
    </script>
</body>
</html>

