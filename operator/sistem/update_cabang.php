<?php
include_once '../../sistem/koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$id=@$_GET['id'];


$query = mysqli_query($koneksi, "UPDATE cabang SET nama_cabang='$nama',alamat='$alamat',telpon='$telp' where id_cabang='$id'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Cabang Berhasil di uppdate'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Cabang Gagal diupdate'
    ];
}
header('location: ../index.php?page=cabang');
