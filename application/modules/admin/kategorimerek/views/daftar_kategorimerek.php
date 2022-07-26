<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Kategori & Merek</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-merek" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Merek </a>
            <a href="" data-toggle="modal" data-target=".modal-sub-kategori" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Sub Kategori </a>        
            <a href="" data-toggle="modal" data-target=".modal-kategori" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Kategori </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Kategori & Merek</a></li>
                <li class="active">Daftar Kategori & Merek</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Kategori</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_kategori; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Sub Kategori</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_sub_kategori; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Merek</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-badge text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_merek; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
    </div>
    <!--row -->

    <!-- /row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target=".modal-struktur" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-eye m-r-5"></i>Struktur Kategori </a>        
                <h3 class="box-title m-b-0">Daftar Kategori Produk </h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Gambar</th>
                                <th>Nama Kategori</th>
                                <th>Tipe Kategori</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($kategori)) {
                                $i = 1;
                                foreach ($kategori as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url() . $value->gambar_kategori_thumb; ?>" class="image-popup-fit-width" title="Deskripsi: <?php echo ucwords($value->desc_kategori); ?>">
                                                <img src="<?php echo base_url() . $value->gambar_kategori_thumb; ?>" width="40" height="30">
                                            </a>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_kategori); ?></td>
                                        <td>
                                            <?php if ($value->tipe_kategori == 1) { ?>
                                                <span class="label label-success">utama</span>
                                            <?php } else if ($value->tipe_kategori == 2) { ?>
                                                <span class="label label-danger">sub</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($value->tipe_kategori == 1) { ?>
                                                <a href="#edit_kategori<?php echo $value->id_kategori; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <?php } else if ($value->tipe_kategori == 2) { ?>
                                                <a href="#edit_sub_kategori<?php echo $value->id_kategori; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <?php } ?>
                                            <a onclick="act_delete_kategori(<?php echo $value->id_kategori; ?>, '<?php echo strtoupper($value->nama_kategori); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>                                  
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Merek Produk</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="merek" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Logo Merek</th>
                                <th>Nama Merek</th>
                                <th>Deskripsi</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($merek)) {
                                $i = 1;
                                foreach ($merek as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url() . $value->logo_merek_thumb; ?>" class="image-popup-fit-width" title="Deskripsi: <?php echo ucwords($value->desc_merek); ?>">
                                                <img src="<?php echo base_url() . $value->logo_merek_thumb; ?>" width="40" height="30">
                                            </a>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_merek); ?></td>
                                        <?php
                                        $words = explode(" ", ucwords($value->desc_merek));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td>
                                            <?php echo $limit_word; ?></td>
                                        </td>
                                        <td>
                                            <a href="#edit_merek<?php echo $value->id_merek; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_merek(<?php echo $value->id_merek; ?>, '<?php echo strtoupper($value->nama_merek); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>                                      
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<div class="modal fade modal-kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori</h4>
                <small>Silahkan Menambahkan Kategori Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('kategorimerek/post_kategori'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namakat" class="col-2 col-form-label">Nama Kategori</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_kategori" placeholder="Inputkan Nama Kategori" id="namakat" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Pakaian Anak"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Gambar Kategori</label>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="gambar_kategori" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" required/>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 550*550 pixel)"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="desc_kategori" id="desckat"></textarea>
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                        </div>
                    </div>                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade modal-sub-kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Sub Kategori</h4>
                <small>Silahkan Menambahkan Sub Kategori Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('kategorimerek/post_sub_kategori'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namakat" class="col-2 col-form-label">Nama Sub Kategori</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_kategori" placeholder="Inputkan Nama Kategori" id="namakat" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Pakaian Anak"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Kategori Utama</label>
                        <div class="col-10">
                            <select class="form-control required" name="id_level" id="kat_lvl" required>
                                <option value="">Pilih Kategori Utama</option>
                                <?php
                                if (!empty($kategori)) {
                                    foreach ($kategori as $key => $value) {
                                        ?> 
                                        <option value="<?php echo $value->id_kategori; ?>"><?php echo $value->nama_kategori; ?></option>
                                        <?php
                                    }  //ngatur nomor urut
                                }
                                ?>          
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada, silahkan tambah Kategori)</small> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Gambar Kategori</label>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="gambar_kategori" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png"/>
                            </div>
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 550*550 pixel)"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="desc_kategori" id="desckat"></textarea>
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                        </div>
                    </div>                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- sample modal tag -->
<div class="modal fade modal-merek" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Merek</h4>
                <small>Silahkan Menambahkan Merek Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('kategorimerek/post_merek'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">         
                    <div class="form-group row">
                        <label for="namamerek" class="col-2 col-form-label">Nama Merek</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_merek" placeholder="Inputkan Nama Merek" id="namamerek" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Nike, Adidas, Samsung"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Logo Merek</label>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="logo_merek" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" required/>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 1Mb (logo diutamakan resolusi 200*100 pixel)"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descmerek" class="col-2 col-form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="desc_merek" id="descmerek"></textarea>
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- sample modal tag -->
<div class="modal fade modal-struktur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Detail Struktur Kategori</h4>
                <small>Detail Treeview struktur Kategori dan Sub Kategori</small>
            </div>
            <div class="modal-body">           
                <div class="col-sm-12 col-xs-12">                   
                    <div id="treeview_json" class=""></div>
                </div>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
if (!empty($kategori)) {
    foreach ($kategori as $key => $value) {
        ?>       
        <div id="edit_kategori<?php echo $value->id_kategori; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Kategori "<?php echo strtoupper($value->nama_kategori); ?>"</h4>
                        <small>Silahkan Mengedit Kategori Produk Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('kategorimerek/update_kategori/' . $value->id_kategori); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="namakat" class="col-2 col-form-label">Nama Kategori</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $value->nama_kategori; ?>" name="nama_kategori" placeholder="Inputkan Nama Kategori" id="namakat" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Pakaian Anak"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Gambar Kategori</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <input type="text" name="gambar_temp" value="<?php echo $value->gambar_kategori; ?>" style="display:none" />
                                        <input type="text" name="gambar_temp_thumb" value="<?php echo $value->gambar_kategori_thumb; ?>" style="display:none" />
                                        <input type="file" id="input-file-now" name="gambar_kategori" data-default-file="<?php echo base_url() . $value->gambar_kategori_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                                    </div>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 550*550 pixel)"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text" rows="5" name="desc_kategori" id="desckat"><?php echo $value->desc_kategori; ?></textarea>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                                </div>
                            </div>                      
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
    }
}
?>	
<?php
if (!empty($kategori)) {
    foreach ($kategori as $key => $value) {
        ?>       
        <div id="edit_sub_kategori<?php echo $value->id_kategori; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Sub Kategori "<?php echo strtoupper($value->nama_kategori); ?>"</h4>
                        <small>Silahkan Mengedit Sub Kategori Produk Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('kategorimerek/update_sub_kategori/' . $value->id_kategori); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="namakat" class="col-2 col-form-label">Nama Kategori</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $value->nama_kategori; ?>" name="nama_kategori" placeholder="Inputkan Nama Kategori" id="namakat" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Pakaian Anak"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kategori Utama</label>
                                <div class="col-10">
                                    <select class="form-control required" name="id_level" id="kat_lvl" required>
                                        <option value="<?php echo $value->id_level; ?>">
                                            <?php
                                            if (!empty($kategori)) {
                                                foreach ($kategori as $key => $val) {
                                                    if ($value->id_level == $val->id_kategori) {
                                                        ?> 
                                                        <?php echo $val->nama_kategori; ?>
                                                        <?php
                                                    }
                                                }  //ngatur nomor urut
                                            }
                                            ?>    
                                        </option>
                                        <?php
                                        if (!empty($kategori)) {
                                            foreach ($kategori as $key => $val) {
                                                ?> 
                                                <option value="<?php echo $val->id_kategori; ?>"><?php echo $val->nama_kategori; ?></option>
                                                <?php
                                            }  //ngatur nomor urut
                                        }
                                        ?>          
                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada, silahkan tambah Kategori)</small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Gambar Kategori</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <input type="text" name="gambar_temp" value="<?php echo $value->gambar_kategori; ?>" style="display:none" />
                                        <input type="text" name="gambar_temp_thumb" value="<?php echo $value->gambar_kategori_thumb; ?>" style="display:none" />
                                        <input type="file" id="input-file-now" name="gambar_kategori" data-default-file="<?php echo base_url() . $value->gambar_kategori_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                                    </div>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 550*550 pixel)"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text" rows="5" name="desc_kategori" id="desckat"><?php echo $value->desc_kategori; ?></textarea>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                                </div>
                            </div>                      
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
    }
}
?>
<?php
if (!empty($merek)) {
    foreach ($merek as $key => $value) {
        ?>       
        <div id="edit_merek<?php echo $value->id_merek; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Merek "<?php echo strtoupper($value->nama_merek); ?>"</h4>
                        <small>Silahkan Mengedit Merek Produk Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('kategorimerek/update_merek/' . $value->id_merek); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">         
                            <div class="form-group row">
                                <label for="namamerek" class="col-2 col-form-label">Nama Merek</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="nama_merek" value="<?php echo $value->nama_merek; ?>" placeholder="Inputkan Nama Merek" id="namamerek" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Nike, Adidas, Samsung"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Logo Merek</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <input type="text" name="logo_temp" value="<?php echo $value->logo_merek; ?>" style="display:none" />
                                        <input type="text" name="logo_temp_thumb" value="<?php echo $value->logo_merek_thumb; ?>" style="display:none" />
                                        <input type="file" id="input-file-now" name="logo_merek" data-default-file="<?php echo base_url() . $value->logo_merek_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png"/>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 1Mb (logo diutamakan resolusi 200*100 pixel)"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descmerek" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text" rows="5" name="desc_merek" id="descmerek"><?php echo $value->desc_merek; ?></textarea>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                                </div>
                            </div>                   
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
    }
}
?>	
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
</script>
<script>
    jQuery(document).ready(function () {
        $("#kat_lvl").select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "<?php echo site_url("kategorimerek/get_struktur_kategori") ?>",
            dataType: "json",
            success: function (response)
            {
                initTree(response)
            }
        });

        function initTree(treeData) {
            $('#treeview_json').treeview({
                levels: 99,
                expandIcon: 'ti-angle-right',
                onhoverColor: "rgba(0, 0, 0, 0.05)",
                selectedBackColor: "#03a9f3",
                collapseIcon: 'ti-angle-down',
                nodeIcon: 'glyphicon glyphicon-bookmark',
                data: treeData
            });
        }

    });
</script>
<script>

    function act_delete_kategori(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus kategori " + name + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("kategorimerek/delete_kategori") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Kategori " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });
            } else {
                swal("Dibatalkan", "Kategori " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<script>

    function act_delete_merek(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus merek " + name + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("kategorimerek/delete_merek") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Merek " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Merek " + name + " batal dihapus.", "error");
            }
        });
    }
</script>