<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Daftar Size & Warna</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-warna" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Warna </a>
            <a href="" data-toggle="modal" data-target=".modal-size" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Size </a>
            <ol class="breadcrumb">               
                <li><a href="#">Size & Warna</a></li>
                <li class="active">Daftar Size & Warna</li>
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
                <h3 class="box-title">Jumlah Size</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-cut text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_size; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Warna</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-palette text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_warna; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Produk</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-basket text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_produk; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
    </div>
    <!--row -->
    <!-- /row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Size Produk</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Nama Size</th>
                                <th>Deskripsi</th>
                                <th>Tgl Post</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($size)) {
                                foreach ($size as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo strtoupper($value->nama_size); ?></td>
                                        <?php
                                        $words = explode(" ", ucwords($value->desc_size));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td><?php echo $value->tanggal_post; ?></td>
                                        <td>
                                            <a href="#edit_size<?php echo $value->id_size; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_size(<?php echo $value->id_size; ?>, '<?php echo strtoupper($value->nama_size); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>
                                    <?php
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
                <h3 class="box-title m-b-0">Daftar Warna Produk</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="warna" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Nama Warna</th>
                                <th>Deskripsi</th>
                                <th>Tgl Post</th>  
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($warna)) {
                                foreach ($warna as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo strtoupper($value->nama_warna); ?></td>
                                        <?php
                                        $words = explode(" ", ucwords($value->desc_warna));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td><?php echo$value->tanggal_post; ?></td>
                                        <td>
                                            <a href="#edit_warna<?php echo $value->id_warna; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_warna(<?php echo $value->id_warna; ?>, '<?php echo strtoupper($value->nama_warna); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>
                                    <?php
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
<!-- sample modal size & warna -->
<div class="modal fade modal-size" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Size</h4>
                <small>Silahkan Menambahkan Size Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('produk/sizewarna/post_size'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namasize" class="col-2 col-form-label">Nama Size</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_size" placeholder="Inputkan Nama Size" id="namasize" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "XL"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descsize" class="col-2 col-form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="desc_size" id="descsize"></textarea>
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "Tinggi: 170cm, Lebar: 60cm"</small>  
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
<div class="modal fade modal-warna" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Warna</h4>
                <small>Silahkan Menambahkan Warna Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('produk/sizewarna/post_warna'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namawarna" class="col-2 col-form-label">Nama Warna</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_warna" placeholder="Inputkan Nama Warna" id="namawarna" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Merah"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kodewarna" class="col-2 col-form-label">Kode Warna</label>
                        <div class="col-10">
                            <input class="colorpicker form-control" type="text" name="kode_warna" placeholder="Inputkan Kode Warna" id="kodewarna" required readonly>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descwarna" class="col-2 col-form-label">Deskripsi</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="desc_warna" id="descwarna"></textarea>
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
<?php
if (!empty($size)) {
    foreach ($size as $key => $value) {
        ?> 
        <div id="edit_size<?php echo $value->id_size; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Size</h4>
                        <small>Silahkan Mengedit Size Produk Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('produk/sizewarna/update_size/' . $value->id_size); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="namasize" class="col-2 col-form-label">Nama Size</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="nama_size" value="<?php echo $value->nama_size; ?>" placeholder="Inputkan Nama Size" id="namasize" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "XL"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descsize" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text" rows="5" name="desc_size" id="descsize"><?php echo $value->desc_size; ?></textarea>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "Tinggi: 170cm, Lebar: 60cm"</small>  
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
if (!empty($warna)) {
    foreach ($warna as $key => $value) {
        ?> 
        <div id="edit_warna<?php echo $value->id_warna; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Warna</h4>
                        <small>Silahkan Mengedit Warna Produk Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('produk/sizewarna/update_warna/' . $value->id_warna); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="namawarna" class="col-2 col-form-label">Nama Warna</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="nama_warna" value="<?php echo $value->nama_warna; ?>"  placeholder="Inputkan Nama Warna" id="namawarna" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Merah"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kodewarna" class="col-2 col-form-label">Kode Warna</label>
                                <div class="col-10">
                                    <input class="colorpicker form-control" type="text" name="kode_warna" value="<?php echo $value->kode_warna; ?>" placeholder="Inputkan Kode Warna" id="kodewarna" required readonly>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descwarna" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text" rows="5" name="desc_warna" id="descwarna"><?php echo $value->desc_warna; ?></textarea>
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
<script>

    function act_delete_size(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus size " + name + "!",
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
                    url: "<?php echo site_url("produk/sizewarna/delete_size") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Size " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Size " + name + " batal dihapus.", "error");
            }
        });
    }
</script> 
<script>

    function act_delete_warna(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus warna " + name + "!",
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
                    url: "<?php echo site_url("produk/sizewarna/delete_warna") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Warna " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Warna " + name + " batal dihapus.", "error");
            }
        });
    }
</script>

