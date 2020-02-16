<?php
include_once '../../sistem/koneksi.php';
// var_dump($_POST);
$nama = $_POST['nama'];
$cabang = $_POST['cabang'];
$telp = $_POST['telp'];
$id=$_POST['id'];

$query = mysqli_query($koneksi, "INSERT INTO driver  VALUES ('$id', '$cabang', '$nama', '$telp','0')");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Driver Berhasil ditambahkan'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Driver Gagal ditambahkan'
    ];
}
header('location: ../index.php?page=driver');

/* End of File: d:\Ampps\www\project\laundry\operator\sistem\add_jurnal.php */