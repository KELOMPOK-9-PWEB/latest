<?php
$conn = mysqli_connect("localhost", "root", "", "ukm");

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
