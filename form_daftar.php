<?php
/* ── NAVBAR + LOGIKA SIMPAN ─────────────────── */
include 'navbar.php';

/* DB minimal
CREATE TABLE pendaftaran_ukm (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama  VARCHAR(100),
  prodi VARCHAR(100),
  ukm   VARCHAR(30),
  tgl_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $db = new mysqli('localhost','root','','ukm');
    if ($db->connect_errno) die('Gagal koneksi: '.$db->connect_error);

    $nama  = $db->real_escape_string($_POST['nama']  ?? '');
    $prodi = $db->real_escape_string($_POST['prodi'] ?? '');
    $ukm   = $db->real_escape_string($_POST['ukm']   ?? '');

    if ($nama && $prodi && $ukm){
        $db->query("INSERT INTO pendaftaran_ukm (nama,prodi,ukm)
                    VALUES ('$nama','$prodi','$ukm')");

        // catat ke TXT
        $baris = date('Y-m-d H:i:s')." | $nama | $prodi | $ukm".PHP_EOL;
        if ($f=fopen('pendaftar_ukm.txt','a')){
            flock($f,LOCK_EX); fwrite($f,$baris); flock($f,LOCK_UN); fclose($f);
        }
        $sukses=true;
    }else{
        $error='Semua field wajib diisi.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pendaftaran UKM</title>
<style>
/* RESET */
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial,Helvetica,sans-serif}

/* JARAK DARI NAVBAR (≈80 px nav + 20 px ruang) */
body{background:#f9fafb;width:100%;overflow-x:hidden;padding-top:100px;}

/* WRAPPER FORM */
.container{
  width:100%;max-width:480px;margin:0 auto;padding:24px;background:#fff;
  border-radius:8px;box-shadow:0 2px 8pxrgb(247, 248, 253);
}

/* TEKS & FIELD */
h2{text-align:center;margin-bottom:12px;font-size:1.4rem}
label{display:block;margin-top:16px;font-weight:600}
input,select{
  width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:4px;margin-top:6px;
}

/* TOMBOL */
button{margin-top:24px;width:100%;padding:12px 0;border:0;border-radius:6px;
       background:#2563eb;color:#fff;font-size:16px;cursor:pointer}
button:hover{background:#1d4ed8}

/* NOTIFIKASI */
.alert{margin-top:16px;padding:12px;border-radius:4px}
.alert.success{background:#dcfce7;color:#166534}
.alert.error  {background:#fee2e2;color:#991b1b}
</style>
</head>
<body>
  <div class="container">
    <h2>Form Pendaftaran UKM</h2>

    <!-- notifikasi -->
    <?php if(!empty($sukses)): ?>
      <div class="alert success">Terima kasih, <b><?=htmlspecialchars($nama)?></b>!
        Pendaftaran UKM <b><?=htmlspecialchars($ukm)?></b> berhasil.</div>
    <?php elseif(!empty($error)): ?>
      <div class="alert error"><?=htmlspecialchars($error)?></div>
    <?php endif; ?>

    <!-- form -->
    <form method="post">
      <label for="nama">Nama Lengkap</label>
      <input  type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap"
              value="<?=htmlspecialchars($_POST['nama'] ?? '')?>">

      <label for="prodi">Program Studi</label>
      <input  type="text" id="prodi" name="prodi" required placeholder="Masukkan prodi"
              value="<?=htmlspecialchars($_POST['prodi'] ?? '')?>">

      <label for="ukm">Pilih UKM</label>
      <select id="ukm" name="ukm" required>
        <option value="" disabled <?=empty($_POST['ukm'])?'selected':'';?>>&mdash; pilih &mdash;</option>
        <option value="Basket" <?=(@$_POST['ukm']=='Basket')?'selected':'';?>>Basket</option>
        <option value="Tari"   <?=(@$_POST['ukm']=='Tari')  ?'selected':'';?>>Tari</option>
        <option value="Musik"  <?=(@$_POST['ukm']=='Musik') ?'selected':'';?>>Musik</option>
      </select>

      <button type="submit">Daftar</button>
      <div style="text-align: center; margin-top: 10px;">
      <a href="login_admin2.php" style="font-size: 10px; color: #999; text-decoration: none;">Login Admin</a>
      </div>
    </form>
  </div>
</body>
</html> 
