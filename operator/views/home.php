<?php
$tahun = @$_GET['tahun'] ? $_GET['tahun'] : date('Y');
$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$data_jml_transaksi = [];

$jmldriver=mysqli_query($koneksi, " SELECT COUNT(id_driver) as cok FROM driver where status='0'");
$driv = mysqli_fetch_assoc($jmldriver);
$pengemudi = $driv['cok'];

$jml=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as cok FROM cabang");
$cab = mysqli_fetch_assoc($jml);
$cabangs = $cab['cok'];


$tr=mysqli_query($koneksi, " SELECT * FROM transaksi");
$total=0;
$totalorder=0;
while($data = mysqli_fetch_array($tr)){
    $total+=$data['total'];
    $totalorder+=1;

}


$cabang=$_GET['cabang'];
if ($_SESSION['level']=='Admin') {
   
for ($i=0; $i < count($bulan); $i++) { 
    $data_jml_transaksi[$i] = 0;
    $query = mysqli_query($koneksi, "SELECT COUNT(kode_transaksi) AS jml_transaksi, tgl_transaksi FROM transaksi WHERE DATE_FORMAT(tgl_transaksi, '%Y') = '$tahun' and id_cabang='$cabang'  GROUP BY DATE_FORMAT(tgl_transaksi, '%m')");
    while ($data_transaksi = mysqli_fetch_assoc($query)) {
        if (date('m', strtotime($data_transaksi['tgl_transaksi'])) == $i+1) {
            $data_jml_transaksi[$i] = (int) $data_transaksi['jml_transaksi'];
        }
        }
    }
}else{
    $idcab=$_SESSION['cabang'];
for ($i=0; $i < count($bulan); $i++) { 
    $data_jml_transaksi[$i] = 0;
    $query = mysqli_query($koneksi, "SELECT COUNT(kode_transaksi) AS jml_transaksi, tgl_transaksi FROM transaksi WHERE DATE_FORMAT(tgl_transaksi, '%Y') = '$tahun' and id_cabang='$idcab'  GROUP BY DATE_FORMAT(tgl_transaksi, '%m')");
    while ($data_transaksi = mysqli_fetch_assoc($query)) {
        if (date('m', strtotime($data_transaksi['tgl_transaksi'])) == $i+1) {
            $data_jml_transaksi[$i] = (int) $data_transaksi['jml_transaksi'];
        }
        }
    }
}


?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><?= $title ?></h2>
            </div>
            
            <div class="ml-md-auto py-2 py-md-0">
                <a href="index.php?page=add_member" class="btn btn-white btn-border btn-round mr-2">Add Member</a>
                <a href="index.php?page=add_pesanan" class="btn btn-secondary btn-round">Add Pesanan</a>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="page-inner mt--5">
<div class="row mt--2">
<?php               if($_SESSION['level']=='Admin'){
 ?>

                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $pengemudi ?></h2>
                                                
                                                <p class="card-category">Driver</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $cabangs ?></h2>
                                                
                                                <p class="card-category">Total Cabang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-success card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $total ?></h2>
                                                <p class="card-category">Pendapatan Semua Cabang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $totalorder ?></h2>
                                                <p class="card-category">total Order</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{
                            $id_cabang=@$_SESSION['cabang'];

                            $drvcb=mysqli_query($koneksi, " SELECT COUNT(id_driver) as cok FROM driver where status='0' and id_cabang='$id_cabang'");
                            $dr = mysqli_fetch_assoc($drvcb);
                            $totpengemudiready = $dr['cok'];
                            

                            $drvcb1=mysqli_query($koneksi, " SELECT COUNT(id_driver) as cek FROM driver where status='1' and id_cabang='$id_cabang'");
                            $dr1 = mysqli_fetch_assoc($drvcb1);
                            $totpengemudiantar = $dr1['cek'];

                            $sql=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as cekt FROM transaksi where   id_cabang='$id_cabang' and status < '4' ");
                            $transaksi = mysqli_fetch_assoc($sql);
                            $totransaksi = $transaksi['cekt'];
 
                            $sql0=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as cektz FROM transaksi where   id_cabang='$id_cabang' and status='0'");
                            $order0 = mysqli_fetch_assoc($sql0);
                            $tot0 = $order0['cektz'];
                            
                            $sql1=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as cekta FROM transaksi where   id_cabang='$id_cabang' and status='1'");
                            $order1 = mysqli_fetch_assoc($sql1);
                            $tot1 = $order1['cekta'];

                            $sql2=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as ceks FROM transaksi where   id_cabang='$id_cabang' and status='2'");
                            $order2 = mysqli_fetch_assoc($sql2);
                            $tot2 = $order2['ceks'];
                            
                            $sql3=mysqli_query($koneksi, " SELECT COUNT(id_cabang) as ceka FROM transaksi where   id_cabang='$id_cabang' and status='3'");
                            $order3 = mysqli_fetch_assoc($sql3);
                            $tot3 = $order3['ceka'];
                            
                            $sql3=mysqli_query($koneksi, "SELECT COUNT(id_cabang) as cekd FROM transaksi where   id_cabang='$id_cabang' and status='4'");
                            $order4 = mysqli_fetch_assoc($sql3);
                            $tot4 = $order4['cekd'];


                                $tr=mysqli_query($koneksi, " SELECT * FROM transaksi where id_cabang='$id_cabang'");
                                $total=0;
                                $totalorder=0;
                                while($data = mysqli_fetch_array($tr)){
                                    $total+=$data['total'];
                                  
                                }
                             ?>   
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $totpengemudiready ?></h2>
                                                <p class="card-category">Driver Ready</p>

                                                <h2><?php echo $totpengemudiantar ?></h2>
                                                <p class="card-category">Driver Mengantar</p>
                                                
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface-6"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $totransaksi ?></h2>
                                                
                                                <p class="card-category">Total Transaksi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-success card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h2><?php echo $total ?></h2>
                                                <p class="card-category">Total Pendapatan Cabang Ini</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <h5><?php echo $tot0 ?></h5>
                                                <p class="card-category">total Order Status Menuggu</p>
                                                <h5><?php echo $tot1 ?></h5>
                                                <p class="card-category">total Order Status Dikerjakan</p>
                                                <h5><?php echo $tot2 ?></h5>
                                                <p class="card-category">total Order Status Selesai </p>
                                                <h5><?php echo $tot3 ?></h5>
                                                <p class="card-category">total Order Status Dikirim</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                    </div>
                </div>

                    
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <div class="card-title">Pemesanan</div>
                        </div>
                        <?php
                        if ($_SESSION['level']=='Admin') {
                           
                         
                        $datac=mysqli_query($koneksi,"SELECT * FROM cabang");

                         ?>
                        <div class="col-4 text-right ml-auto">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-8 p-1 ml-auto">
                                        <select name="cabang" id="" class="form-control">
                                            <option value="">Cabang/Outlet</option>
                                            <?php 
                                                while($datas = mysqli_fetch_array($datac)){

                                            ?>
                                            <option value="<?php echo $datas['id_cabang'] ?>" <?php if ($datas['id_cabang']== @$_GET['cabang']): echo "selected"; ?>
                                                
                                            <?php endif ?>><?php echo $datas['nama_cabang'] ?></option>
                                            

                                            <?php 
                                                }

                                             ?>

                                        </select>
                                        <br>
                                        <select name="tahun" id="" class="form-control">
                                            <option value="">Tahun</option>
                                            <?php for ($st=date('Y'); $st > date(Y)-5; $st--): ?>
                                                <option value="<?= $st ?>" <?= ($st == $tahun) ? 'selected' : '' ?>><?= $st ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-4 p-1">
                                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                        ?> 
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let data = {
    labels: <?= json_encode(array_values($bulan)) ?> ,
    datasets: [{        
        label: 'Jumlah Transaksi',
        borderColor: 'rgb(18, 105, 219)',
        fill: false,
        lineTension: 0.1,
        data: <?= json_encode($data_jml_transaksi) ?>
    }]
}

let options = {
    scales: {
        yAxes: [{
            display: true,
            ticks: {
                beginAtZero: true   // minimum value will be 0.
            }
        }]
    }
};
</script>
