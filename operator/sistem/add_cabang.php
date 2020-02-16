<?php
include_once '../../sistem/koneksi.php';

$nama = $_POST['nama'];
$cabang = $_POST['cabang'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

$query = mysqli_query($koneksi, "INSERT INTO cabang VALUES (' ', '$nama', '$alamat', '$telp')");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Cabang Berhasil ditambahkan'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Cabang Gagal ditambahkan'
    ];
}
header('location: ../index.php?page=cabang');


/* End of File: D:\Ampps\www\project\laundry\operator\sistem\add_coa.php */