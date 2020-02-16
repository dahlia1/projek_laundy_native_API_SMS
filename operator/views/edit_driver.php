<?php
$data_driver = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM driver WHERE id_driver = '$_GET[id_driver]'"));
$id=$_GET['id_driver'];
?>

<div class="page-inner">
    <div class="row heading">
        <div class="col-12">
            <h2 class="pb-2 fw-bold"><?= $title ?></h2>
        </div>
    </div>

    <div class="card">
        <form action="sistem/update_driver.php?id=<?php echo $id ?>" method="post">
            <div class="card-body">
                <div class="row">
 
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Nama Driver :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="name" value="<?= $data_driver['nama_driver'] ?>" placeholder="Masukan Nama Driver" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp">Telp :</label>
                    <input type="number" name="telp" id="telp" class="form-control" autocomplete="tel" value="<?= $data_driver['telpon'] ?>" pattern="^[08][0-9]{10,15}" title="Masukan Nomor Telpon yang valid, seperti 085774237xxx. Telp hanya bisa berisi angka" placeholder="Masukan Telp Member" required>
                </div>
                
                <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Cabang :</label>

                        
                        <select class="form-control" name="cabang">
                        	<?php 
                        		$sql=mysqli_query($koneksi,"SELECT * FROM cabang");
                        		while($data = mysqli_fetch_array($sql)){

                        		?>
                        		<option value="<?php echo $data['id_cabang'] ?>" <?php if ($data['id_cabang']==$data_driver['id_cabang']): echo "selected"; ?>
                        			
                        		<?php endif ?>><?php echo $data['nama_cabang'] ?></option>
                        		<?php  	
                        		}
                        	 ?>
                        </select>
                    </div>
                    
            </div>
            <div class="card-footer"><input type="submit" value="Save" class="btn btn-primary"></div>
        </form>
    </div>
</div>