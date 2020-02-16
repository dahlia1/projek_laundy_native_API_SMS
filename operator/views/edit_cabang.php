<?php
$data_cabang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM cabang WHERE id_cabang = '$_GET[id_cabang]'"));
$id=$_GET['id_cabang'];
?>

<div class="page-inner">
    <div class="row heading">
        <div class="col-12">
            <h2 class="pb-2 fw-bold"><?= $title ?></h2>
        </div>
    </div>

    <div class="card">
        <form action="sistem/update_cabang.php?id=<?php echo $id ?>" method="post">
            <div class="card-body">
                <div class="row">
 
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Nama Driver :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="name" value="<?= $data_cabang['nama_cabang'] ?>" placeholder="Masukan Nama Cabang" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp">Telp :</label>
                    <input type="number" name="telp" id="telp" class="form-control" autocomplete="tel" value="<?= $data_cabang['telpon'] ?>" pattern="^[08][0-9]{10,15}" title="Masukan Nomor Telpon yang valid, seperti 085774237xxx. Telp hanya bisa berisi angka" placeholder="Masukan Telp Member" required>
                </div>
                
                <div class="form-group col-sm-12 col-md-6">
                        
                        <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Alamat  :</label>
                        <br>
                        <textarea name="alamat" cols="50" class="form-control"><?php echo $data_cabang['alamat'] ?>
                        </textarea>
                    </div>
                    </div>
                    
            </div>
            <div class="card-footer"><input type="submit" value="Save" class="btn btn-primary"></div>
        </form>
    </div>
</div>