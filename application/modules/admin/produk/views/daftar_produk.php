<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Produk</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/add_produk'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Produk </a>
            <ol class="breadcrumb">               
                <li><a href="#">Produk</a></li>
                <li class="active">Daftar Produk</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Produk</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-shopping-cart-full text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_produk; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Produk Rekomendasi</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->rekomendasi; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Produk Promo</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-cut text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->promo; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Produk Baru</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-new-window text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->kondisi; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Produk Toko</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="produk" class="display nowrap " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>SKU Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Merek</th>
                                <th>Rekomen</th> 
                                <th>Promo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Produk</th>
                                <th>SKU Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Merek</th>
                                <th class="clear-td">Rekomen</th> 
                                <th class="clear-td">Promo</th>
                                <th class="clear-td">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($produk)) {
                                foreach ($produk as $key => $value) {
                                    ?> 
                                    <tr>
                                        <?php
                                        $words = explode(" ", strtoupper($value->nama_produk));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td><b><?php echo $value->sku_produk; ?></b></td>
                                        <td><b>Rp. </b><?php echo $value->harga_barang; ?></td>
                                        <td>
                                            <?php if ($value->stok_barang <= 5) { ?>
                                                <span class="label label-danger font-weight-200"> <b><?php echo $value->stok_barang; ?></b> item</span>
                                            <?php } elseif ($value->stok_barang > 5 && $value->stok_barang <= 10) { ?>
                                                <span class="label label-warning font-weight-200"> <b><?php echo $value->stok_barang; ?></b> item</span>
                                            <?php } else { ?>
                                                <span class="label label-success font-weight-200"> <b><?php echo $value->stok_barang; ?></b> item</span>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_kategori); ?></td>
                                        <td>
                                            <?php if ($value->nama_merek != '' or $value->nama_merek != NULL) { ?>                               
                                                <b><?php echo strtoupper($value->nama_merek); ?></b>
                                            <?php } else { ?>
                                                <b>TIDAK ADA MEREK</b>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($value->status_rekomendasi == 1) { ?>
                                                <input type="checkbox" class="rekomen<?php echo $value->id_produk; ?>" checked data-toggle="switch" name="status_rekomendasi" data-size="mini" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                            <?php } else { ?>
                                                <input type="checkbox" class="rekomen<?php echo $value->id_produk; ?>" data-toggle="switch" name="status_rekomendasi" data-size="mini" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($value->status_promo == 1) { ?>
                                                <input type="checkbox" class="prom<?php echo $value->id_produk; ?>" checked data-toggle="switch" name="status_promo" data-size="mini" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                            <?php } else { ?>
                                                <input type="checkbox" class="prom<?php echo $value->id_produk; ?>" data-toggle="switch" name="status_promo" data-size="mini" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('produk/detail_produk/' . $value->id_produk); ?>"><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
                                            <a href="<?php echo site_url('produk/edit_produk/' . $value->id_produk); ?>"><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_produk(<?php echo $value->id_produk; ?>, '<?php echo strtoupper($value->nama_produk); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-remove"></i></button></a>
                                            <a onclick="act_send_newsletter(<?php echo $value->id_produk; ?>, '<?php echo strtoupper($value->nama_produk); ?>')" ><button class="btn btn-outline btn-success btn-sm waves-effect waves-light"><i class="fa fa-mail-forward"></i></button></a>
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
</script>
<script>
    function act_send_newsletter(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin mengirim newsletter untuk produk " + name + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, kirim!",
            cancelButtonText: "Tidak, batal!",
            showLoaderOnConfirm: true,
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("mailer/mail/send_newsletter") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terkirim!", "Newsletter produk " + name + " telah terkirim.", "success");
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Newsletter produk " + name + " batal dikirim.", "error");
            }
        });
    }
</script>
<script>

    function act_delete_produk(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus produk " + name + "!",
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
                    url: "<?php echo site_url("produk/delete_produk") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Produk " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        console.log(result);
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Produk " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<?php
if (!empty($produk)) {
    foreach ($produk as $key => $value) {
        ?> 
        <script>
            var rek<?php echo $value->id_produk; ?> = $(".rekomen<?php echo $value->id_produk; ?>").bootstrapSwitch();
            rek<?php echo $value->id_produk; ?>.on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin merekomendasikan produk ini!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, setuju!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("produk/edit_status_rekomendasi") ?>",
                                data: {id: '<?php echo $value->id_produk; ?>', value: 1},
                                dataType: 'html',
                                success: function (result) {
                                    rek<?php echo $value->id_produk; ?>.bootstrapSwitch('state', true);
                                    swal("Berhasil!", "Produk anda telah di rekomendasikan.", "success");
                                },
                                error: function (result) {
                                    swal("Opsss!", "No Network connection.", "error");
                                }
                            });
                        } else {
                            rek<?php echo $value->id_produk; ?>.bootstrapSwitch('state', false);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }

                    });
                } else {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin menghapus status rekomendasi produk ini!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, setuju!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("produk/edit_status_rekomendasi") ?>",
                                data: {id: '<?php echo $value->id_produk; ?>', value: 0},
                                dataType: 'html',
                                success: function (result) {
                                    rek<?php echo $value->id_produk; ?>.bootstrapSwitch('state', false);
                                    swal("Berhasil!", "Produk anda tidak direkomendasikan.", "success");
                                },
                                error: function (result) {
                                    swal("Opsss!", "No Network connection.", "error");
                                }
                            });
                        } else {
                            rek<?php echo $value->id_produk; ?>.bootstrapSwitch('state', true);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }
                    });
                }
            });
        </script>
        <script>
            var pro<?php echo $value->id_produk; ?> = $(".prom<?php echo $value->id_produk; ?>").bootstrapSwitch();
            pro<?php echo $value->id_produk; ?>.on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin mempromokan produk ini!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, setuju!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            swal({
                                title: "Potongan harga!",
                                text: "*Harga Awal: <b>Rp. <?php echo $value->harga_barang; ?></b>",
                                html: true,
                                type: "input",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                closeOnCancel: false,
                                inputPlaceholder: "Inputkan dalam persentase (%)"
                            }, function (inputValue) {
                                var harga_awal = <?php echo str_replace('.', '', $value->harga_barang); ?>;
                                if (inputValue === false) {
                                    pro<?php echo $value->id_produk; ?>.bootstrapSwitch('state', false);
                                    swal("Dibatalkan", "Anda membatalkan promo.", "error");
                                    return false
                                }
                                if (inputValue === "") {
                                    swal.showInputError("Isi persentase potongan terlebih dahulu!");
                                    return false
                                } else {
                                    var potong = harga_awal - ((inputValue / 100) * harga_awal);
                                    $.ajax({
                                        type: "post",
                                        url: "<?php echo site_url("produk/edit_status_promo") ?>",
                                        data: {id: '<?php echo $value->id_produk; ?>', value: 1, potongan: inputValue, harga_promo: potong},
                                        dataType: 'html',
                                        success: function (result) {
                                            pro<?php echo $value->id_produk; ?>.bootstrapSwitch('state', true);
                                            swal("Berhasil!", "Produk anda telah dipromokan. *Harga: " + potong, "success");
                                        },
                                        error: function (result) {
                                            swal("Opsss!", "No Network connection.", "error");
                                        }
                                    });
                                }
                            });
                        } else {
                            pro<?php echo $value->id_produk; ?>.bootstrapSwitch('state', false);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }
                    });
                } else {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin menghapus status promo produk ini!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, setuju!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("produk/edit_status_promo") ?>",
                                data: {id: '<?php echo $value->id_produk; ?>', value: 0},
                                dataType: 'html',
                                success: function (result) {
                                    pro<?php echo $value->id_produk; ?>.bootstrapSwitch('state', false);
                                    swal("Berhasil!", "Produk anda tidak dipromokan.", "success");
                                },
                                error: function (result) {
                                    swal("Opsss!", "No Network connection.", "error");
                                }
                            });

                        } else {
                            pro<?php echo $value->id_produk; ?>.bootstrapSwitch('state', true);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }
                    });
                }
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>         