<?php 

 ?>
<div class="page-inner">
    <div class="row heading">
        <div class="col-12">
            <h2 class="pb-2 fw-bold"><?= $title ?></h2>
        </div>
    </div>

    <div class="card">
        <form action="sistem/add_cabang.php" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Nama Cabang :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="name" placeholder="Masukan Nama Cabang" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="nama">Alamat  :</label>
                        <br>
                        <textarea name="alamat" cols="50" class="form-control">
                            
                        </textarea>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="telp">Telp :</label>
                    <input type="number" name="telp" id="telp" class="form-control" autocomplete="tel" pattern="^[08][0-9]{10,15}" title="Masukan Nomor Telpon yang valid, seperti 085774237xxx. Telp hanya bisa berisi angka" placeholder="Masukan Telp Cabang" required>
                </div>
            </div>
            <div class="card-footer"><input type="submit" value="Save" class="btn btn-primary"></div>
        </form>
    </div>
</div>