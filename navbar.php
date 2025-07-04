<nav class="nav-bar">
    <div class="nav-left">
        <img src="logo_ukm.png" alt="Logo UKM" style="height:50px;">
        <strong>UKM UNIVERSITAS AHMAD DAHLAN</strong>
    </div>

    <div class="nav-right">
        <a href="index.php">HOME</a>
        <a href="profil_ukm.php">PROFIL UKM</a>
        
        <div class="dropdown">
            <a href="agenda.php" class="dropbtn">AGENDA <span class="arrow">&#9662;</span></a>
            <div class="dropdown-content">
                <a href="agenda.php?category=basket">Agenda UKM Basket</a>
                <a href="agenda.php?category=tari">Agenda UKM Tari</a>
                <a href="agenda.php?category=musik">Agenda UKM Musik</a>
            </div>
        </div>
        <a href="info_ukm.php">INFO UKM</a>
    </div>
</nav>

<style>
/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

/* NAVBAR */
.nav-bar {
    position: fixed; /* nempel di atas, selalu terlihat */
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between; /* kiri & kanan ke ujung */
    align-items: center;
    padding: 12px 24px; /* jarak dalam */
    background: #003366; /* biru tua */
    color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, .05);
    z-index: 1000; /* di atas elemen lain */
}

/* KIRI: logo + judul */
.nav-left {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: bold;
}

/* KANAN: menu */
.nav-right {
    display: flex;
    gap: 24px; /* Jarak antar item menu utama */
}

.nav-right a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    transition: color .2s ease-in-out;
    padding: 10px 0; /* Tambahkan padding vertikal agar hover area lebih besar */
}

.nav-right a:hover {
    color: #dbeafe;
}

/* Dropdown Container */
.dropdown {
    position: relative;
    display: inline-block; /* Agar dropdown di samping link lain */
}

.dropdown .dropbtn {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    padding: 10px 0; /* Padding agar sesuai dengan link lain */
    transition: color .2s ease-in-out;
    cursor: pointer; /* Menunjukkan bisa diklik */
    display: flex; /* Untuk menengahkan teks dan panah */
    align-items: center;
    gap: 5px; /* Jarak antara teks dan panah */
}

.dropdown .dropbtn:hover {
    color: #dbeafe;
}

/* Panah kecil */
.dropdown .arrow {
    font-size: 0.8em;
    transition: transform 0.3s ease; /* Animasi panah */
}

/* Putar panah saat dropdown di-hover */
.dropdown:hover .arrow {
    transform: rotate(180deg);
}

/* Dropdown Content (the sub-menu) */
.dropdown-content {
    display: none; /* Sembunyikan secara default */
    position: absolute;
    background-color: #003366; /* Warna latar sub-menu sama seperti navbar */
    min-width: 180px; /* Lebar minimum sub-menu */
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 1; /* Pastikan di atas konten lain */
    border-radius: 0 0 5px 5px; /* Sudut bawah melengkung */
    top: 100%; /* Posisikan tepat di bawah dropbtn */
    left: 50%; /* Pusatkan dropdown di bawah dropbtn */
    transform: translateX(-50%); /* Geser kembali 50% lebarnya ke kiri */
    overflow: hidden; /* Pastikan sudut melengkung terlihat */
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block; /* Agar setiap link sub-menu menempati satu baris penuh */
    text-align: left; /* Teks sub-menu rata kiri */
    font-weight: normal; /* Font normal untuk sub-menu */
}

.dropdown-content a:hover {
    background-color: #0056b3; /* Warna saat di-hover */
    color: #fff;
}

/* Tampilkan dropdown menu saat parent di-hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* -- konten utama tidak tertutup navbar -- */
body {
    padding-top: 80px; /* 64-px tinggi navbar + sedikit ruang */
}
</style>
<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
  const navToggle = document.getElementById('navToggle');
  const navMenu = document.getElementById('navMenu');
  
  navToggle.addEventListener('click', function() {
    navMenu.classList.toggle('active');
    navToggle.classList.toggle('active');
  });
  
  // Close mobile menu when clicking on a link
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function() {
      navMenu.classList.remove('active');
      navToggle.classList.remove('active');
    });
  });
  
  // Close mobile menu when clicking outside
  document.addEventListener('click', function(e) {
    if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
      navMenu.classList.remove('active');
      navToggle.classList.remove('active');
    }
  });
});
</script>
