<?php
$host = "localhost";
$user = "root";
$pass = "boyapr6409";
$db = "web_login";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
