<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='" . $username . "' AND password='" . $password . "'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['admin'] = $data['username'];
        header("Location: kelola_pendaftar.php");
        exit();
    } else {
        $error = "Login gagal. Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin UKM</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #003366; /* Biru tua */
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 360px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #1f2d3d;
            font-weight: 600;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: #f0f0f0;
            font-size: 14px;
        }

        .login-container input:focus {
            background: #e8f0fe;
            outline: none;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #003366; /* Tombol biru tua */
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 15px;
            margin-top: 15px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .login-container button:hover {
            background: #003366;
            transform: translateY(-2px);
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Admin UKM</h2>

    <?php if (!empty($error)) { echo "<div class='error-message'>$error</div>"; } ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
