<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar FAQ</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-tambahfaq" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah FAQ </a>
            <ol class="breadcrumb">               
                <li><a href="#"> FAQ</a></li>
                <li class="active">Daftar FAQ</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Produk</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-shopping-cart-full text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_produk; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total FAQ</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-info-alt text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_faq; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->

    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar FAQ Website</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Petanyaan</th>
                                <th>Jawaban</th>                              
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($faq)) {
                                foreach ($faq as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $value->pertanyaan; ?></td>
                                        <?php
                                        $words = explode(" ", strip_tags($value->jawaban));
                                        $limit_word = implode(" ", array_splice($words, 0, 5));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td>
                                            <a href="#lihat_faq<?php echo $value->id_faq; ?>" data-toggle="modal" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
                                            <a href="#edit_faq<?php echo $value->id_faq; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_faq(<?php echo $value->id_faq; ?>, '<?php echo strtoupper($value->pertanyaan); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
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
<div class="modal fade bs-example-modal-lg modal-tambahfaq" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah FAQ</h4>
                <small>Silahkan Menambahkan FAQ Website Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('faq/post_faq'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="tanya" class="col-2 col-form-label">Pertanyaan</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="pertanyaan" placeholder="Inputkan Pertanyaan FAQ" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Bagaimana Saya Mengembalikan Produk?"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Jawaban</label>
                        <div class="col-10">
                            <textarea  class="form-control" id="faq" rows="10" name="jawaban" required></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "1. Login ke akun Website.</br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;2. Klik menu Transaksi, lalu klik Lihat Semua Transaksi.</br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;3. Cari transaksi yang ingin dikomplain, lalu klik tombol Komplain. </br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;4. Alasan komplain "Barang belum saya terima", lalu klik tombol Lanjutkan.</br>
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;5. Komplain terkirim. Admin akan menanggapi melalui e-mail dalam waktu 1x24 jam.</small> 
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
<?php
if (!empty($faq)) {
    foreach ($faq as $key => $value) {
        ?> 
        <div id="lihat_faq<?php echo $value->id_faq; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail FAQ</h4>
                        <small>Detail Pertanyaan dan Jawaban terkait FAQ </small>
                    </div>
                    <div class="modal-body">          
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-info">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title"> <a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" ><?php echo $value->pertanyaan; ?> </a> </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body"> 
                                        <?php echo $value->jawaban; ?>
                                    </div>
                                </div>
                            </div>
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
    }
}
?>	
<?php
if (!empty($faq)) {
    foreach ($faq as $key => $value) {
        ?> 
        <div id="edit_faq<?php echo $value->id_faq; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit FAQ</h4>
                        <small>Edit Pertanyaan dan Jawaban terkait FAQ </small>
                    </div>
                    <form class="form" action="<?php echo site_url('faq/update_faq/' . $value->id_faq); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label for="tanya" class="col-2 col-form-label">Pertanyaan</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="pertanyaan" value="<?php echo $value->pertanyaan; ?>" placeholder="Inputkan Pertanyaan FAQ" id="tanya" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Bagaimana Saya Mengembalikan Produk?"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Jawaban</label>
                                <div class="col-10">
                                    <textarea class="form-control faq<?php echo $value->id_faq; ?>" rows="10" name="jawaban" required><?php echo $value->jawaban; ?></textarea>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "1. Login ke akun Website.</br>
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;2. Klik menu Transaksi, lalu klik Lihat Semua Transaksi.</br>
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;3. Cari transaksi yang ingin dikomplain, lalu klik tombol Komplain. </br>
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;4. Alasan komplain "Barang belum saya terima", lalu klik tombol Lanjutkan.</br>
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;5. Komplain terkirim. Admin akan menanggapi melalui e-mail dalam waktu 1x24 jam.</small> 
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
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
<?php
if (!empty($faq)) {
    foreach ($faq as $key => $value) {
        ?> 
        <script>
                                                $('.faq<?php echo $value->id_faq; ?>').wysihtml5({
                                                    "font-styles": false, //Font styling, e.g. h1, h2, etc.
                                                    "emphasis": true, //Italics, bold, etc.
                                                    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
                                                    "link": true, //Button to insert a link.
                                                    "image": true, //Button to insert an image.      
                                                });
        </script>
        <?php
    }
}
?>	

<script>
    function act_delete_faq(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus FAQ (" + name + ")!",
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
                    url: "<?php echo site_url("faq/delete_faq") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "FAQ (" + name + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "FAQ (" + name + ") batal dihapus.", "error");
            }
        });
    }
</script>
