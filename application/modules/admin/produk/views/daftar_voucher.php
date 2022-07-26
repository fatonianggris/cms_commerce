<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Voucher</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-voucher" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Voucher </a>
            <ol class="breadcrumb">               
                <li><a href="#">Voucher</a></li>
                <li class="active">Daftar Voucher</li>
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
                <h3 class="box-title">Jumlah Voucher</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-cut text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_voucher; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Produk Dengan Voucher</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_produk_voucher; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div> 
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Produk</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-basket text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->jumlah_produk; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
    </div>
    <!--row -->
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Voucher Produk</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="vouch" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                               
                                <th>Kode Voucher</th>
                                <th>Potongan</th> 
                                <th>Jumlah Voucher</th> 
                                <th>Voucher Terpakai</th> 
                                <th>Masa Berlaku</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($voucher)) {
                                foreach ($voucher as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><b><?php echo strtoupper($value->kode_voucher); ?></b></td>
                                        <td><b><?php echo $value->potongan; ?></b> %</td>
                                        <td>
                                            <span class="label label-success font-weight-200"> <b><?php echo $value->jumlah_voucher; ?></b> item</span>
                                        </td>
                                        <td>
                                            <?php if (($value->jumlah_voucher - $value->voucher_terpakai) <= 2) { ?>
                                                <span class="label label-danger font-weight-200"> <b><?php echo $value->voucher_terpakai; ?></b> item</span>
                                            <?php } else { ?>
                                                <span class="label label-success font-weight-200"> <b><?php echo $value->voucher_terpakai; ?></b> item</span>
                                            <?php } ?>
                                        </td>                                       
                                        <td><?php echo $value->masa_berlaku; ?></td>
                                        <td>
                                            <a href="#edit_voucher<?php echo $value->id_voucher; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_voucher(<?php echo $value->id_voucher; ?>, '<?php echo strtoupper($value->kode_voucher); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
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
<!-- sample modal voucher & warna -->
<div class="modal fade modal-voucher" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Voucher</h4>
                <small>Silahkan Menambahkan Voucher Produk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('produk/voucher/post_voucher/'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namavoucher" class="col-2 col-form-label">Kode Voucher</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="kode_voucher" placeholder="Inputkan Kode Voucher" id="namavoucher" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "GMS324"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="potongan" class="col-2 col-form-label">Potongan (%)</label>
                        <div class="col-10">
                            <input class="form-control" type="number" min="1" max="100" name="potongan" placeholder="Inputkan Potongan Voucher" id="potongan" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, dalam persen (%)</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jmlvoucher" class="col-2 col-form-label">Jumlah Voucher</label>
                        <div class="col-10">
                            <input class="form-control" type="number" min="1" name="jumlah_voucher" placeholder="Inputkan Jumlah Voucher" id="jmlvoucher" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="msberlaku" class="col-2 col-form-label">Masa Berlaku</label>
                        <div class="col-10">
                            <input class="form-control" id="datepicker-autoclose" type="text" name="masa_berlaku" placeholder="Inputkan Masa Berlaku" id="msberlaku" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
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
if (!empty($voucher)) {
    foreach ($voucher as $key => $value) {
        ?> 
        <div id="edit_voucher<?php echo $value->id_voucher; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Voucher</h4>
                        <small>Silahkan Mengedit Voucher Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('produk/voucher/update_voucher/' . $value->id_voucher); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="namavoucher" class="col-2 col-form-label">Kode Voucher</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="kode_voucher" value="<?php echo $value->kode_voucher; ?>" placeholder="Inputkan Kode Voucher" id="namavoucher" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "GMS324"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="potongan" class="col-2 col-form-label">Potongan (%)</label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="1" name="potongan" value="<?php echo $value->potongan; ?>" placeholder="Inputkan Potongan Voucher" id="potongan" required>

                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, dalam persen (%)</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jmlvoucher" class="col-2 col-form-label">Jumlah Voucher</label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="1" name="jumlah_voucher" value="<?php echo $value->jumlah_voucher; ?>" placeholder="Inputkan Jumlah Voucher" id="jmlvoucher" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="msberlaku" class="col-2 col-form-label">Masa Berlaku</label>
                                <div class="col-10">
                                    <input class="form-control" id="datepicker<?php echo $value->id_voucher; ?>" type="text" name="masa_berlaku" value="<?php echo $value->masa_berlaku; ?>" placeholder="Inputkan Masa Berlaku" id="msberlaku" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
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
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<?php
if (!empty($voucher)) {
    foreach ($voucher as $key => $value) {
        ?> 
        <script>
                                                $('#datepicker<?php echo $value->id_voucher; ?>').datepicker({
                                                    autoclose: true,
                                                    todayHighlight: true
                                                });
        </script>
        <?php
    }
}
?>
<script>
    $('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>
<script>
    function act_delete_voucher(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus voucher " + name + "!",
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
                    url: "<?php echo site_url("produk/voucher/delete_voucher") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Voucher " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Voucher " + name + " batal dihapus.", "error");
            }
        });
    }
</script> 

