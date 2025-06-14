<?php
include 'koneksi.php';

if (isset($_POST['inputbarang'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $satuan = $_POST['satuan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok_minimal = $_POST['stok_minimal'];
    $tanggal_dibuat = $_POST['tanggal_dibuat'];
    $tanggal_diperbarui = $_POST['tanggal_diperbarui'];

    $query = mysqli_query($koneksi, "INSERT INTO produk 
        VALUES('', '$kode_produk', '$nama_produk', '$deskripsi', '$satuan', 
        '$harga_beli', '$harga_jual', '$stok_minimal', '$tanggal_dibuat', '$tanggal_diperbarui')");

    if ($query) {
        header('Location: produk.php');
    } else {
        echo "Gagal input: " . mysqli_error($koneksi);
    }
}
?>
