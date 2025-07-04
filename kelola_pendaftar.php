<?php
session_start();

// Cek login
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin2.php");
    exit;
}

// Koneksi DB
$koneksi = mysqli_connect("localhost", "root", "", "ukm");

// Proses hapus jika ada parameter hapus
if (isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query_hapus = "DELETE FROM pendaftaran_ukm WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query_hapus)) {
        $pesan = "berhasil_hapus";
    } else {
        $pesan = "gagal_hapus";
    }
    
    // Redirect untuk menghindari reload berulang
    header("Location: kelola_pendaftar.php?pesan=$pesan");
    exit;
}

$query = "SELECT * FROM pendaftaran_ukm";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f6ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #003f7f;
        }

        a {
            color: #005bba;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 63, 127, 0.1);
        }

        th {
            background-color: #007acc;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #eef6ff;
        }

        .logout {
            float: right;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .hapus-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }

        .hapus-btn:hover {
            background-color: #c82333;
        }

        .pesan {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .sukses {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Pendaftar UKM</h2>
        <a href="logout.php" class="logout">Logout</a><br><br>

        <?php
        // Tampilkan pesan jika ada
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'berhasil_hapus') {
                echo "<div class='pesan sukses'>Pendaftar berhasil dihapus!</div>";
            } elseif ($_GET['pesan'] == 'gagal_hapus') {
                echo "<div class='pesan error'>Gagal menghapus pendaftar!</div>";
            }
        }
        ?>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>UKM</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['prodi']}</td>
                        <td>{$row['ukm']}</td>
                        <td>
                            <a href='?hapus=true&id={$row['id']}' 
                               onclick='return confirm(\"Yakin ingin menghapus pendaftar ini?\")'>
                                <button class='hapus-btn'>Hapus</button>
                            </a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</body>
</html>
