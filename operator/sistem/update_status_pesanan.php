<?php
include_once '../../sistem/koneksi.php';

$status = $_GET['s'];
$kode_transaksi = base64_decode($_GET['k']);

switch ($status) {
    case '2':
        $new_status = 'Telah Selesai Dikerjakan';
        break;

    case '3':
        $new_status = 'Sedang Dikirim';
        break;

    case '4':
        $new_status = 'Telah Selesai';
        break;

    case '1':
    default:
        $new_status = 'Sedang Dikerjakan';
        break;
}

$ququ = mysqli_query($koneksi, "SELECT a.*,b.* FROM transaksi a,cabang b WHERE a.kode_transaksi = '$kode_transaksi' and a.id_cabang=b.id_cabang");

$datalogis=mysqli_fetch_array($ququ);
$logistik=$datalogis['logistik'];
$number=$datalogis['telp'];
$cabang=$datalogis['nama_cabang'];


if ($status =='3') {
    $dr=$_POST['driver'];
    $kode_transaksi=$_GET['k'];

   
    $ququ = mysqli_query($koneksi, "SELECT a.*,b.* FROM transaksi a,cabang b WHERE a.kode_transaksi = '$kode_transaksi' and a.id_cabang=b.id_cabang");

    $datalogis=mysqli_fetch_array($ququ);
    $logistik=$datalogis['logistik'];
    $number=$datalogis['telp'];
    $cabang=$datalogis['nama_cabang'];
 
   $querys = mysqli_query($koneksi, "UPDATE driver SET status = '1' WHERE id_driver = '$dr'");
   var_dump($number);
   $query = mysqli_query($koneksi, "UPDATE transaksi SET status = '$status',id_pengantar='$dr' WHERE kode_transaksi = '$kode_transaksi'");

            echo "<script>alert('aya')</script>";    
            $api = 'monchichisuGE0vtFjfiQakYd'; // Kode API
            $pesan='pelanggan yang terhormat di infokan bahwa laundry diantarkan oleh driver outlet  '.$cabang; // Pesan maksimal 160 Karakter
            $tujuan=$number; //Nomer tujuan
            $paket = 'BIASA'; // BIASA = 3 Token , VIP = 10 Token

            $url = "https://apisms.my.id/api/sms.php";

            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "api=".$api."&tujuan=".$tujuan."&pesan=".$pesan."&paket=".$paket);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            $result = curl_exec($curlHandle);
            curl_close($curlHandle);

            $b = json_decode($result, true);

   
    if ($query) {
        mysqli_query($koneksi, "INSERT INTO log_transaksi (pegawai, status, kode_transaksi) VALUES ('$_SESSION[nama]', '$status', '$kode_transaksi')");
        $_SESSION['pesan'] = [
            'status' => 'success',
            'msg' => 'Staus Pesanan Diupdate Menjadi ' . $new_status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'error',
            'msg' => 'Gagal Mengupdate Status Pesanan'
        ];
    } 
}else if($status=='4'){
    $pengantar=$_GET['dr'];
   $query = mysqli_query($koneksi, "UPDATE transaksi SET status = '$status' WHERE kode_transaksi = '$kode_transaksi'");



   $query = mysqli_query($koneksi, "UPDATE driver SET status = '0' WHERE id_driver = '$pengantar'");
   
    if ($query) {
        mysqli_query($koneksi, "INSERT INTO log_transaksi (pegawai, status, kode_transaksi) VALUES ('$_SESSION[nama]', '$status', '$kode_transaksi')");
        $_SESSION['pesan'] = [
            'status' => 'success',
            'msg' => 'Staus Pesanan Diupdate Menjadi ' . $new_status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'error',
            'msg' => 'Gagal Mengupdate Status Pesanan'
        ];
    }
}else{
$query = mysqli_query($koneksi, "UPDATE transaksi SET status = '$status' WHERE kode_transaksi = '$kode_transaksi'");
if ($query) {
    mysqli_query($koneksi, "INSERT INTO log_transaksi (pegawai, status, kode_transaksi) VALUES ('$_SESSION[nama]', '$status', '$kode_transaksi')");
    $_SESSION['pesan'] = [
        'status' => 'success',
        'msg' => 'Staus Pesanan Diupdate Menjadi ' . $new_status
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'error',
        'msg' => 'Gagal Mengupdate Status Pesanan'
    ];
}
var_dump($logistik);
    if($logistik == "Ambil Sendiri"){
       
            $api = 'monchichisuGE0vtFjfiQakYd'; // Kode API
            $pesan='pelanggan yang terhormat di infokan bahwa laundry telah dapat di ambil pada outlet '.$cabang; // Pesan maksimal 160 Karakter
            $tujuan=$number; //Nomer tujuan
            $paket = 'BIASA'; // BIASA = 3 Token , VIP = 10 Token

            $url = "https://apisms.my.id/api/sms.php";

            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "api=".$api."&tujuan=".$tujuan."&pesan=".$pesan."&paket=".$paket);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            $result = curl_exec($curlHandle);
            curl_close($curlHandle);

            $b = json_decode($result, true);


        

    }
}
 header('location: ../index.php?page=pesanan');
