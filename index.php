<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
$koneksi = new mysqli("localhost", "root", "", "acuzstore_db");
if (isset($_POST['submit'])) {
  $stmt = $koneksi->prepare("INSERT INTO produk (nama, deskripsi, harga_min, harga_max, kategori) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdds", $_POST['nama'], $_POST['deskripsi'], $_POST['harga_min'], $_POST['harga_max'], $_POST['kategori']);
  $stmt->execute();
  echo "<script>alert('Produk ditambahkan');location.href='index.php';</script>";
}
$result = $koneksi->query("SELECT * FROM produk");
?>
<h2>Admin Panel - Produk</h2>
<a href="logout.php">Logout</a>
<form method="POST">
  <input name="nama" placeholder="Nama Produk" required><br>
  <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
  <input name="harga_min" type="number" placeholder="Harga Min"><br>
  <input name="harga_max" type="number" placeholder="Harga Max"><br>
  <input name="kategori" placeholder="Kategori"><br>
  <button name="submit">Simpan</button>
</form>
<hr>
<h3>Daftar Produk</h3>
<ul>
<?php while($row = $result->fetch_assoc()): ?>
  <li><?= $row['nama'] ?> - Rp<?= $row['harga_min'] ?> - <?= $row['kategori'] ?></li>
<?php endwhile; ?>
</ul>
