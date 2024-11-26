<?php
$conn = new mysqli("sql205.infinityfree.com", "if0_37789147", "Evan190604", "if0_37789147_ayobelajar");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>