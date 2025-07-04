<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Agenda UKM Universitas Ahmad Dahlan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* ---------------------  VARIABEL & WARNA  --------------------- */
        :root{
            --primary-color:#003366;   /* biru UAD */
            --secondary-color:#0056b3; /* biru gelap hover */
            --text-color:#333;
            --light-gray:#f8f8f8;
            --border-color:#eee;
            --shadow-light:0 4px 8px rgba(0,0,0,.08);
            --shadow-medium:0 8px 16px rgba(0,0,0,.2);
        }
        /* ---------------------  RESET DASAR  -------------------------- */
        *{box-sizing:border-box}
        body{
            font-family:'Poppins',sans-serif;
            margin:0;
            background:var(--light-gray);
            color:var(--text-color);
            line-height:1.6;
            padding-top:80px;          /* ruang untuk navbar fixed */
        }
        /* ---------------------  NAVBAR UTAMA  ------------------------- */
        nav{
            background:var(--primary-color);
            box-shadow:var(--shadow-medium);
            position:fixed;top:0;left:0;width:100%;z-index:1000;
        }
        .nav-bar{
            max-width:1200px;          /* ganti sekali, berlaku di semua page */
            margin:0 auto;
            padding:0 24px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .nav-left{
            display:flex;
            gap:12px;
            font-weight:700;
            color:#fff;
            align-items:center;
        }
        .nav-left img{height:50px}
        .nav-right{
            display:flex;
            gap:24px;                 /* <<< perbaiki typo gap 24px */
            align-items:center;
        }
        .nav-right a,
        .dropdown .dropbtn{
            color:#fff;text-decoration:none;font-weight:600;
            padding:10px 0;display:block;
            transition:color .2s;
        }
        .nav-right a:hover,
        .dropdown .dropbtn:hover{color:#dbeafe}
        /* ---------- dropdown ---------- */
        .dropdown{position:relative}
        .dropdown .arrow{font-size:.8em;transition:transform .3s}
        .dropdown:hover .arrow{transform:rotate(180deg)}
        .dropdown-content{
            display:none;position:absolute;left:50%;top:calc(100% + 5px);
            transform:translateX(-50%);
            background:#003366;color:#fff;
            min-width:180px;border-radius:0 0 5px 5px;
            box-shadow:0 8px 16px rgba(0,0,0,.2);z-index:1;
            overflow:hidden;white-space:nowrap
        }
        .dropdown-content a{padding:12px 16px;display:block}
        .dropdown-content a:hover{background:#0056b3}
        .dropdown:hover .dropdown-content{display:block}
        /* ---------------------  KONTEN UTAMA  ------------------------- */
        .content-container{
            width:90%;max-width:960px;margin:30px auto;
            background:#fff;padding:30px;border-radius:10px;
            box-shadow:var(--shadow-light);
        }
        .content-container h2{
            color:var(--primary-color);text-align:center;
            margin:0 0 15px;font-size:2.2em;font-weight:700;
        }
        .content-container p.intro{
            text-align:center;margin:0 0 30px;font-size:1.1em;color:#555;
        }
        /* ---------------------  KOTAK SERAGAM (CARD) ------------------ */
        .card{
            background:#fff;
            border:1px solid var(--border-color);
            border-radius:10px;
            padding:24px;margin-bottom:24px;
            box-shadow:var(--shadow-light);
            transition:transform .2s, box-shadow .2s;
        }
        .card:hover{transform:translateY(-4px);box-shadow:var(--shadow-medium)}
        /* teks di dalam agenda */
        .agenda-item h4{margin:0 0 10px;color:var(--primary-color);font-size:1.5em;font-weight:600}
        .agenda-item p{margin:0 0 8px}
        .agenda-item strong{color:var(--secondary-color)}
        .agenda-item .details{
            font-size:.9em;color:#666;margin-top:15px;padding-top:10px;
            border-top:1px dashed var(--border-color)
        }
        /* ---------------------  RESPONSIVE NAVBAR  -------------------- */
        @media(max-width:768px){
            position: fixed; /* nempel di atas, selalu terlihat */
            position: fixed; /* nempel di atas, selalu terlihat */

            .top: 0;
            .left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between; /* kiri & kanan ke ujung */
            align-items: center;
            padding: 12px 24px; /* jarak dalam */
            background: #003366; /* biru tua */
            color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .05);
            z-index: 1000; /* di atas elemen lain */


            .nav-left{width:100%;justify-content:space-between;margin-bottom:10px}
            .nav-right{flex-direction:column;gap: 24px;px;width:100%;align-items:center}
            .dropdown-content{position:static;transform:none;width:100%;box-shadow:none;border-radius:0}
            .dropdown .arrow{display:none}
            .content-container{padding:20px}
        }
    </style>
</head>
<body>

<?php
/* ------------------------- DATA & LOGIKA PHP ------------------------ */
$selectedCategory = $_GET['category'] ?? 'all';

$agendas=[
    ['title'=>'Pelatihan Kepemimpinan UKM','date'=>'10 Juli 2025',
     'details'=>'Diselenggarakan oleh BEM & seluruh UKM. Wajib untuk pengurus inti UKM.',
     'category'=>['general']],
    ['title'=>'Latihan Rutin Basket','time'=>'Setiap Selasa & Kamis pukul 16.00 WIB',
     'location'=>'Lapangan Basket UAD',
     'details'=>'Latihan terbuka untuk semua anggota UKM Basket. Peningkatan skill individu dan strategi tim.',
     'category'=>['basket']],
    ['title'=>'Turnamen Basket Antar Fakultas','date'=>'15‑17 Agustus 2025',
     'location'=>'Lapangan Basket UAD',
     'details'=>'Ajang kompetisi tahunan memperebutkan piala rektor. Pendaftaran tim dibuka 1 Agustus.',
     'category'=>['basket']],
    ['title'=>'Latihan Tari Tradisional','time'=>'Setiap Sabtu pukul 09.00 WIB',
     'location'=>'Gedung Seni UAD',
     'details'=>'Mempelajari berbagai tarian tradisional Indonesia. Anggota baru dipersilakan bergabung.',
     'category'=>['tari']],
    ['title'=>'Rekrutmen Anggota Baru UKM Musik','date'=>'25 Juli 2025','time'=>'10.00‑16.00 WIB',
     'location'=>'Aula UAD Kampus 1',
     'details'=>'Audisi terbuka untuk band, vokal, dan instrumen. Daftar via link IG UKM Musik.',
     'category'=>['musik']],
    ['title'=>'Workshop Penulisan Lagu','date'=>'5 Agustus 2025','time'=>'14.00‑17.00 WIB',
     'location'=>'Ruang Serbaguna UKM',
     'details'=>'Belajar teknik penulisan lirik & melodi dari anggota senior.',
     'category'=>['musik']],
    ['title'=>'Festival UKM 2025','date'=>'30 Agustus 2025',
     'location'=>'Lapangan Utama UAD',
     'details'=>'Pameran seluruh UKM UAD, pertunjukan & stand interaktif terbuka untuk umum.',
     'category'=>['general']]
];

$categoryNames=[
    'basket'=>'Basket','tari'=>'Tari','musik'=>'Musik','all'=>'Semua Kategori'
];
$pageTitle= ($selectedCategory!=='all' && isset($categoryNames[$selectedCategory]))
           ?"AGENDA UKM ".strtoupper($categoryNames[$selectedCategory])
           :"AGENDA KEGIATAN UKM";
?>
<!-- --------------------------- NAVBAR ------------------------------ -->
<nav>
    <div class="nav-bar">
        <div class="nav-left">
            <img src="logo_ukm.png" alt="Logo UKM">
            UKM UNIVERSITAS AHMAD DAHLAN
        </div>

        <div class="nav-right">
            <a href="index.php">HOME</a>
            <a href="profil_ukm.php">PROFIL UKM</a>

            <div class="dropdown">
                <a class="dropbtn">AGENDA <span class="arrow">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="agenda.php?category=basket">UKM Basket</a>
                    <a href="agenda.php?category=tari">UKM Tari</a>
                    <a href="agenda.php?category=musik">UKM Musik</a>
                </div>
            </div>

            <a href="info_ukm.php">INFO UKM</a>
        </div>
    </div>
</nav>
<!-- --------------------------- KONTEN ------------------------------ -->
<div class="content-container">
    <h2><?= $pageTitle ?></h2>
    <p class="intro">Berikut beberapa agenda kegiatan Unit Kegiatan Mahasiswa Universitas Ahmad Dahlan:</p>

    <ul style="list-style:none;padding:0;margin:0">
        <?php $found=false;
        foreach($agendas as $ag):
            if($selectedCategory==='all'||in_array($selectedCategory,$ag['category'])):
                $found=true; ?>
                <li class="agenda-item card">
                    <h4><?= $ag['title'] ?></h4>
                    <?php if(isset($ag['date'])): ?>
                        <p><strong>Tanggal:</strong> <?= $ag['date'] ?></p>
                    <?php endif; ?>
                    <?php if(isset($ag['time'])): ?>
                        <p><strong>Waktu:</strong> <?= $ag['time'] ?></p>
                    <?php endif; ?>
                    <?php if(isset($ag['location'])): ?>
                        <p><strong>Lokasi:</strong> <?= $ag['location'] ?></p>
                    <?php endif; ?>
                    <div class="details"><?= $ag['details'] ?></div>
                </li>
        <?php endif; endforeach; ?>
    </ul>

    <?php if(!$found): ?>
        <p style="text-align:center;color:#c00;font-weight:700">
            Tidak ada agenda untuk kategori "<?= htmlspecialchars($categoryNames[$selectedCategory]??$selectedCategory) ?>".
        </p>
    <?php endif; ?>
</div>
</body>
</html>
