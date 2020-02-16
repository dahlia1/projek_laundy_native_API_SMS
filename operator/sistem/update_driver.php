<?php
include_once '../../sistem/koneksi.php';


$id=@$_GET['id'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$cabang = $_POST['cabang'];

$query = mysqli_query($koneksi, "UPDATE driver SET nama_driver = '$nama', telpon = '$telp', id_cabang = '$cabang' WHERE id_driver = '$id'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Data Driver Berhasil diubah'
    ];

} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Data driver Gagal diubah'
    ];
}
     header('location: ../index.php?page=driver');

