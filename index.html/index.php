<?php
$servername = "localhost";
$username = "kullanici_adi";
$password = "sifre";
$dbname = "veritabani_adi";

// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT temperature, created_at AS time FROM sensor_data ORDER BY created_at DESC LIMIT 20";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
