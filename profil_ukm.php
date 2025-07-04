<?php
include 'navbar.php';

$ukm = isset($_GET['ukm']) ? strtolower($_GET['ukm']) : '';
$valid = ['basket','musik','tari'];
if(!in_array($ukm,$valid)) $ukm='';

function card($img,$title,$desc,$slug){
    echo "<div class=\"card\">
        <img src=\"$img\" alt=\"$title\">
        <div class=\"card-body\">
            <h3>$title</h3>
            <p>$desc</p>
            <a href=\"profil_ukm.php?ukm=$slug\" class=\"btn primary\">Selengkapnya</a>
        </div>
    </div>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil UKM UAD</title>
    <link rel="stylesheet" href="style.css">
    <style>
        :root{
            --primary:#003366;
            --primary-hover:#005599;
        }
        body{font-family:Arial,Helvetica,sans-serif;line-height:1.6;background:#f7f9fc;}
        .container{max-width:960px;margin:0 auto;padding:30px 20px;}
        h2{color:var(--primary);text-align:center;margin-bottom:32px;}
        .hero{margin-bottom:26px;text-align:center;}
        .hero img{width:100%;max-height:340px;object-fit:cover;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,.1);}    
        .hero-desc{margin:20px auto 40px auto;max-width:720px;font-size:1rem;color:#333;text-align:center;}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:28px;margin-top:10px;}
        .card{background:#fff;border:1px solid #e3e7ed;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,.06);display:flex;flex-direction:column;transition:.2s;}
        .card:hover{transform:translateY(-3px);box-shadow:0 4px 12px rgba(0,0,0,.08);}    
        .card img{width:100%;height:190px;object-fit:cover;}
        .card-body{padding:18px 15px;flex:1;display:flex;flex-direction:column;gap:10px;}
        .btn{margin-top:auto;padding:10px 16px;background:var(--primary);color:#fff;text-decoration:none;border-radius:4px;text-align:center;transition:.2s;}
        .btn:hover{background:var(--primary-hover);}
        .detail-card{max-width:740px;margin:0 auto 40px auto;}
        .info-section{display:flex;gap:20px;margin-top:30px;align-items:center;}
        .info-section img{width:200px;height:200px;object-fit:cover;border-radius:10px;}
        .info-text p{margin:6px 0;}
        .daftar-btn{text-align:center;margin-top:40px;}
        .daftar-btn a{padding:14px 26px;background:var(--primary);color:#fff;border-radius:8px;text-decoration:none;font-weight:bold;}
        .daftar-btn a:hover{background:var(--primary-hover);}
    </style>
</head>
<body>
<div class="container">
    <h2>PROFIL UKM UNIVERSITAS AHMAD DAHLAN</h2>

    <?php if($ukm===''): ?>
        <div class="hero">
            <img src="mahasiswa-ukm1.png" alt="UKM Universitas Ahmad Dahlan">
        </div>
        <p class="hero-desc">
            Unit Kegiatan Mahasiswa (UKM) Universitas Ahmad Dahlan merupakan wadah pengembangan minat, bakat, dan kreativitas mahasiswa dalam berbagai bidang akademik maupun non‑akademik. Melalui UKM, mahasiswa dapat berkontribusi, berprestasi, dan memperluas jejaring di tingkat lokal hingga nasional.
        </p>
        <div class="grid">
            <?php 
                card('ganteng.png','UKM Basket','Wadah pengembangan minat di olahraga bola basket serta aktif mengikuti berbagai kompetisi.','basket'); 
                card('musik.png','UKM Seni Musik','Komunitas pecinta musik lintas genre yang rutin menggelar event dan showcase.','musik'); 
                card('tari.png','UKM Tari','Unit kegiatan yang melestarikan seni tari tradisional maupun kontemporer Nusantara.','tari'); 
            ?>
        </div>
    <?php else: ?>
        <?php
            $data = [
                'basket' => [
                    'ganteng.png',
                    'UKM Basket',
                    'UKM Basket UAD merupakan wadah bagi mahasiswa yang ingin menyalurkan dan mengembangkan minat di bidang olahraga bola basket. Selain latihan rutin, UKM ini juga aktif mengikuti kompetisi lokal maupun nasional seperti Liga Mahasiswa dan PABC.',
                    'basket4.jpg',
                    ['Instagram' => '@ukmbasketuad', 'Facebook' => 'UKM Basket UAD', 'Twitter' => '@basket_uad']
                ],
                'musik' => [
                    'musik.png',
                    'UKM Seni Musik',
                    'UKM Seni Musik adalah komunitas mahasiswa pecinta musik dari berbagai genre, baik modern maupun tradisional. UKM ini menggelar acara seperti "Welcome Music Party", showcase akustik, dan kerap tampil di berbagai event kampus.',
                    'musik.3jpg',
                    ['Instagram' => '@ukmsenimusikuad', 'YouTube' => 'Seni Musik UAD', 'Spotify' => 'UKM Musik UAD']
                ],
                'tari' => [
                    'tari.png',
                    'UKM Tari',
                    'UKM Tari UAD mewadahi mahasiswa yang ingin melestarikan budaya melalui seni tari tradisional dan kontemporer. UKM ini aktif tampil di event lokal maupun nasional dengan membawa tarian Nusantara.',
                    'tari3.jpg',
                    ['Instagram' => '@ukmtariuad', 'TikTok' => '@tariuad', 'YouTube' => 'UKM Tari UAD Official']
                ],
            ];
            [$img,$title,$desc,$fotoKedua,$sosmed] = $data[$ukm];
        ?>
        <div class="card detail-card">
            <img src="tari3.jpg<?= $img ?>" alt="<?= $title ?>">
            <div class="card-body">
                <h3><?= $title ?></h3>
                <p><?= $desc ?></p>
                <p><strong>Ayo bergabung dan jadi bagian dari komunitas inspiratif ini!</strong></p>
            </div>
        </div>

        <div class="info-section">
            <img src="<?= $fotoKedua ?>" alt="Kegiatan <?= $title ?>">
            <div class="info-text">
                <h4>Media Sosial</h4>
                <?php foreach($sosmed as $platform => $akun): ?>
                    <p><strong><?= $platform ?>:</strong> <?= $akun ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="daftar-btn">
            <a href="form_daftar.php?ukm=<?= $ukm ?>">Daftar <?= $title ?></a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
