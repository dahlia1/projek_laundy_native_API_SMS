<?php
include_once '../../sistem/koneksi.php';

$id_driver = $_GET['id_driver'];
$data_pegawai = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_driver FROM driver WHERE id_driver = '$id_driver'"));
$query = mysqli_query($koneksi, "DELETE FROM driver WHERE id_driver = '$id_driver'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Data Driver ' . $data_pegawai['nama_driver'] . ' telah dihapus!'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Data Member ' . $data_pegawai['nama_driver'] . ' gagal dihapus!'
    ];
}
header('location: ../index.php?page=driver');
