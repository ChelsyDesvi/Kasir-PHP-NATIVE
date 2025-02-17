<?php
session_start();
include '../koneksi.php';

if (isset($_POST['selesai-transaksi'])) {
    // Ambil total harga dari transaksi
    $query_total = "SELECT SUM(sub_total_harga) AS total FROM detail_pembelian WHERE id_pembelian = ".$_SESSION['id_pembelian'];
    $eksekusi_total = mysqli_query($koneksi, $query_total);
    $data_total = mysqli_fetch_assoc($eksekusi_total);
    $total_harga = $data_total['total'];

    // Update total harga di tabel pembelian
    $query_update_pembelian = "UPDATE pembelian SET harga_jual = $total_harga WHERE id = ".$_SESSION['id_pembelian'];
    mysqli_query($koneksi, $query_update_pembelian);

    // Hapus session transaksi
    unset($_SESSION['id_pembelian']);

    echo "Transaksi selesai. <a href='transaksi.php'>Buat Transaksi Baru</a>";
}
?>   