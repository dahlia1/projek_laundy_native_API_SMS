<?php  
$last_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUBSTR(id_driver, 5, 6) AS id FROM driver ORDER BY id_driver DESC LIMIT 0,1"));
$prefix = 'DRV-';
$new_id = sprintf('%03d', $last_id['id'] + 1);
$full_id = $prefix . $new_id;


?>
<div class="page-inner">
    <div class="row heading">
        <div class="col-12">
            <h2 class="pb-2 fw-bold"><?= $title ?></h2>
        </div>
    </div>

    <div class="card">
        <form action="sistem/add_driver.php" method="post">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="id">ID :</label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="<?= $full_id ?>" disabled>
                        <input type="hidden" name="id" value="<?= $full_id ?>">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="name" placeholder="Masukan Nama Driver" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Cabang :</label>

                        
                        <select class="form-control" name="cabang">
                        	<?php 
                        		$sql=mysqli_query($koneksi,"SELECT * FROM cabang");
                        		while($data = mysqli_fetch_array($sql)){

                        		?>
                        		<option value="<?php echo $data['id_cabang'] ?>"><?php echo $data['nama_cabang'] ?></option>
                        		<?php  	
                        		}
                        	 ?>
                        </select>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="telp">Telp :</label>
                    <input type="number" name="telp" id="telp" class="form-control" autocomplete="tel" pattern="^[08][0-9]{10,15}" title="Masukan Nomor Telpon yang valid, seperti 085774237xxx. Telp hanya bisa berisi angka" placeholder="Masukan Telp Driver" required>
                </div>
            </div>
            <div class="card-footer"><input type="submit" value="Save" class="btn btn-primary"></div>
        </form>
    </div>
</div>