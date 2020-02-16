<?php

include_once '../../sistem/koneksi.php';
$tempat=$_POST['getDetail'];
$cabang=$_SESSION['cabang'];
$data_driver = (mysqli_query($koneksi, "SELECT * FROM driver WHERE id_cabang = '$cabang' and  status='0'"));
?>


        <form action="sistem/update_status_pesanan.php?s=3&k=<?=$tempat?>" method="post">
            <div class="card-body">
                
                <div class="form-group">
                    <label for="jk" class="d-block">Driver Ready</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <select class="form-control" name="driver">
                        	<option disabled="">Pilih Driver</option>
                        	<?php 
                        		while($data=mysqli_fetch_array($data_driver)){
                        	 ?>
                        	<option value="<?php echo $data['id_driver'] ?>"><?php echo $data['nama_driver'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                </div>
                
            </div>
            <div class="card-footer"><input type="submit" value="Pilih Driver Pengantar" class="btn btn-primary"></div>
        </form>