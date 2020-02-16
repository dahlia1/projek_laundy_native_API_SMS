<?php
include_once '../../sistem/koneksi.php';

$id_cabang = $_GET['id_cabang'];
$data_pegawai = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_cabang FROM cabang WHERE id_cabang = '$id_cabang'"));
$query = mysqli_query($koneksi, "DELETE FROM cabang WHERE id_cabang = '$id_cabang'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Data Cabang ' . $data_pegawai['nama_cabang'] . ' telah dihapus!'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Data Cabang ' . $data_pegawai['nama_cabang'] . ' gagal dihapus!'
    ];
}
header('location: ../index.php?page=cabang');
