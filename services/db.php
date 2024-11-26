<?php
$conn = new mysqli("localhost", "root", "", "ayobelajar");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>