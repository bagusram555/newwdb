<?php
$koneksi = new mysqli("localhost", "root", "", "acuzstore_db");
$data = [];
$sql = "SELECT * FROM produk";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>