<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Alat Bayar & Kurir</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-kurir" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-wrench m-r-5"></i>Config API Pengiriman </a>
            <ol class="breadcrumb">               
                <li><a href="#">Alat Bayar & Kurir</a></li>
                <li class="active">Daftar Alat Bayar & Kurir</li>
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
                <h3 class="box-title">Jumlah Alat Bayar</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-money text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_alatbayar; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Kurir Yang Tersedia</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-truck text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_kurir; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>          
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-8">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Alat Bayar Toko</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="alatbayar" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Nama Alat Bayar</th>
                                <th>Atas Nama</th>
                                <th>Nomor Alat Bayar</th>                               
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>    
                            <?php
                            if (!empty($alatbayar)) {
                                foreach ($alatbayar as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php if ($value->tipe_alatbayar == 1) { ?>
                                                <span class="label label-success font-weight-200"> <b>BANK</b></span>
                                            <?php } elseif ($value->tipe_alatbayar == 2) { ?>
                                                <span class="label label-warning font-weight-200"> <b>E-WALLET</b></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <b><?php echo strtoupper($value->nama_alatbayar); ?></b>
                                        </td>                                        
                                        <td><?php echo strtoupper($value->atas_nama); ?></td>
                                        <td><b><?php echo strtoupper($value->nomor_alatbayar); ?></b></td>                                        
                                        <td>
                                            <a href="#modal-card<?php echo $value->id_alatbayar; ?>" data-toggle="modal" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>                                           
                                            <a href="<?php echo site_url('alatbayarkurir/edit_alatbayar/' . $value->id_alatbayar); ?>" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_alatbayar(<?php echo $value->id_alatbayar; ?>, '<?php echo strtoupper($value->nama_alatbayar); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
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
        <div class="col-md-4 col-lg-4 col-sm-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">List Jasa Pengiriman</h3>
                        <hr>
                        <span class="label label-success label-rounded"><i class="ti-truck"></i> JNE</span>
                        <span class="label label-success label-rounded"><i class="ti-truck"></i> TIKI</span>
                        <span class="label label-success label-rounded"><i class="ti-truck"></i> POS</span>
                        <small class="form-text">*List Jasa Pengiriman yang tersedia(pada menu pilih jasa pengiriman)</small> 
                        <hr>
                        <h3 class="box-title m-b-10">Cek API Pengiriman</h3>
                        <div class="form-group">
                            <label for="asal" class="control-label">Asal Pengiriman - 
                                <b>
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <?php
                                        if ($kurir[0]->id_provinsi == $prov['province_id']) {
                                            echo strtoupper($prov['province']);
                                        }
                                        ?>
                                    <?php endforeach; ?> 
                                </b>
                            </label>                            
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-pin"></i></div>
                                <?php
                                $kabu = '';
                                $kabu_tipe = '';
                                foreach ($kabupaten as $kab) :
                                    ?>
                                    <?php
                                    if ($kurir[0]->id_kabupaten == $kab['city_id']) {
                                        $kabu = $kab['city_name'];
                                        $kabu_tipe = strtolower($kab['type']);
                                    }
                                    ?>
                                <?php endforeach; ?> 
                                <?php
                                $keca = '';
                                foreach ($kecamatan as $kec) :
                                    ?>
                                    <?php
                                    if ($kurir[0]->id_kecamatan == $kec['subdistrict_id']) {
                                        $keca = $kec['subdistrict_name'];
                                    }
                                    ?>
                                <?php endforeach; ?> 
                                <input type="text" class="form-control" id="asal" value="<?php echo $kabu . " [" . $kabu_tipe . "]" . " - " . $keca; ?>" placeholder="" readonly>

                            </div>                          
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="control-label">Provinsi Tujuan *</label>                           
                            <select class="form-control required" name="id_provinsi" id="provinsi" required> 
                                <option value="">Pilih Provinsi</option>
                                <?php foreach ($provinsi as $pro) : ?>
                                    <option value="<?php echo $pro['province_id']; ?>"><?php echo $pro['province']; ?></option>
                                <?php endforeach; ?> 
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                        </div>
                        <div class="form-group">
                            <label for="kabupaten" class="control-label">Kabupaten Tujuan *</label>                           
                            <select class="form-control required" name="id_kabupaten" id="kabupaten" required>
                                <option value="">Pilih Kabupaten</option>
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                        </div>
                        <div class="form-group">
                            <label for="kecamatan" class="control-label">Kecamatan Tujuan *</label>                           
                            <select class="form-control required" name="id_kecamatan" id="kecamatan" required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kurir" class="control-label">Kurir *</label>                           
                            <select class="form-control" name="kurir" data-placeholder="Pilih Kurir" id="kurir" >
                                <option value="">Pilih</option>                                
                                <option value="tiki">TIKI</option>
                                <option value="jne">JNE</option>
                                <option value="jnt">JNT</option>
                                <option value="wahana">WAHANA</option>
                                <option value="pos">POS</option>
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                        </div>

                        <div class="form-group col-md-8">
                            <label for="beratbarang" class="control-label">Berat Barang *</label>                               
                            <div class="input-group">
                                <input class="form-control" name="berat_barang" type="number" placeholder="Berat Barang" min="1" id="beratbarang" required>                              
                                <span class="input-group-addon" id="basic-addon1">gram</span>
                            </div>                          
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "1000 gram"</small> 
                        </div> 
                        <div class="form-group col-md-12">
                            <label for="ongkir" class="control-label">Biaya Ongkir</label>                           
                            <select class="form-control required" name="ongkir_id" id="ongkir" required>
                                <option value="">Pilih Paket Ongkir</option>
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                        </div>
                        <div class="form-group">
                            <label for="total" class="control-label">Total Biaya Ongkir + Harga Barang (50.000)</label>                            
                            <div class="input-group">                              
                                <input type="text" class="form-control" id="total" placeholder="Total Harga" readonly>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?php
if (!empty($alatbayar)) {
    foreach ($alatbayar as $key => $value) {
        ?> 
        <!-- sample modal tag -->
        <div class="modal fade" id="modal-card<?php echo $value->id_alatbayar; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Alat Pembayaran</h4>
                        <small>Detail Alat Pembayaran Produk Toko Anda</small>
                    </div>
                    <div class="modal-body">           
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="card-deck">
                                <div class="card">
                                    <div class="card-block">
                                        <h1 class="m-t-0"><img src="<?php echo base_url() . $value->logo_instansi_thumb; ?>" width="150" height="50"></h1>
                                        <h2>No. Rek. <?php echo $value->nomor_alatbayar; ?></h2> <span class="pull-right"><?php echo $value->nama_alatbayar; ?></span> 
                                        <span class="font-500">AN. <?php echo strtoupper($value->atas_nama); ?></span> 
                                    </div>                                   
                                    <div class="card-block">
                                        <hr class="new-hr">
                                        <h4 class="card-title"><u>Catatan Transfer</u></h4>
                                        <p class="card-text">
                                            <?php echo $value->catatan_transfer; ?>
                                        </p>
                                        <h4 class="card-title"><u>Petunjuk Transfer</u></h4>
                                        <p class="card-text">
                                            <?php echo $value->petunjuk_transfer; ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">post: <?php echo $value->tanggal_post; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i> Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
    }  //ngatur nomor urut
}
?>        
<div class="modal fade modal-kurir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Konfigurasi API Pengiriman</h4>
                <small>Silahkan Konfigurasi API Pengiriman Untuk Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('alatbayarkurir/update_api_pengiriman'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body ">           
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Base Url API</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="base_url_api" value="<?php echo $kurir[0]->base_url_api; ?>" placeholder="Inputkan Base URL Api" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">API Key</label>
                        <div class="col-10">
                            <textarea class="form-control" name="api_key" rows="5" placeholder="Inputkan API Key" required><?php echo $kurir[0]->api_key; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-md-2 col-form-label">Provinsi</label>
                        <div class="col-10">
                            <select class="form-control required" name="id_provinsi" id="provinsi_asal" required>
                                <option value="<?php echo $kurir[0]->id_provinsi; ?>">
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <?php
                                        if ($kurir[0]->id_provinsi == $prov['province_id']) {
                                            echo $prov['province'];
                                        }
                                        ?>
                                    <?php endforeach; ?> 
                                </option>                               
                                <?php foreach ($provinsi as $pro) : ?>
                                    <option value="<?php echo $pro['province_id']; ?>"><?php echo $pro['province']; ?></option>
                                <?php endforeach; ?> 
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Provinsi Toko Anda"</small> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kabupaten</label>
                        <div class="col-10">
                            <select class="form-control required" name="id_kabupaten" id="kabupaten_asal" required> 
                                <option value="<?php echo $kurir[0]->id_kabupaten; ?>">
                                    <?php foreach ($kabupaten as $kab) : ?>
                                        <?php
                                        if ($kurir[0]->id_kabupaten == $kab['city_id']) {
                                            echo $kab['city_name'] . " - [" . strtolower($kab['type']) . "]";
                                        }
                                        ?>
                                    <?php endforeach; ?> 
                                </option>
                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Kabupaten Toko Anda"</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kecamatan</label>            
                        <div class="col-10">
                            <select class="form-control" name="id_kecamatan" id="kecamatan_asal">                           
                                <option value="<?php echo $kurir[0]->id_kecamatan; ?>">
                                    <?php foreach ($kecamatan as $kec) : ?>
                                        <?php
                                        if ($kurir[0]->id_kecamatan == $kec['subdistrict_id']) {
                                            echo $kec['subdistrict_name'];
                                        }
                                        ?>
                                    <?php endforeach; ?> 
                                </option>
                            </select>
                            <small class="form-text"><b class="text-danger">*TIDAK </b> Wajib diisi, "Kecamatan Toko Anda"</small> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success uploadfiles"><i class="fa fa-send m-r-5"></i>Submit</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
</script>
<script>
    jQuery(document).ready(function () {
        $("#provinsi").select2();
        $("#provinsi_asal").select2();
    });
</script>
<script>

    function act_delete_alatbayar(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Alat Bayar " + name + "!",
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
                    url: "<?php echo site_url("alatbayarkurir/delete_alatbayar") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Alat Bayar " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Alat Bayar " + name + " batal dihapus.", "error");
            }
        });
    }
    ;
</script>
<script>
    $(document).ready(function () {
        // Ongkir
        $("#provinsi_asal").change(function () {
            var prov = $('#provinsi_asal').val();
            var url = "<?php echo site_url('alatbayarkurir/get_kabupaten_esoftplay/'); ?>" + prov;
            $('#kabupaten_asal').load(url);

            return false;
        });

        $("#kabupaten_asal").change(function () {
            var kab = $('#kabupaten_asal').val();
            var url = "<?php echo site_url('alatbayarkurir/get_kecamatan_esoftplay/'); ?>" + kab;
            $('#kecamatan_asal').load(url);

            return false;
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Ongkir
        function cekongkir() {
            var kab = $('#kabupaten').val();
            var kec = $('#kecamatan').val();
            var destination = '';
            var type_dest = '';

            if (kec !== null && kec.value !== "") {
                destination = kec;
                type_dest = 'subdistrict';
            } else {
                destination = kab;
                type_dest = 'city';
            }

            var berat = $('#beratbarang').val();
            var kurir = $('#kurir').val();
            var url = "<?php echo site_url('alatbayarkurir/get_ongkir'); ?>/" + destination + "/" + berat + "/" + kurir + "/" + type_dest;
            $('#ongkir').load(url);
            console.log(url)
            return false;
        }

        $("#provinsi").change(function () {
            var prov = $('#provinsi').val();
            var url = "<?php echo site_url('alatbayarkurir/get_kabupaten_esoftplay/'); ?>" + prov;
            $('#kabupaten').load(url);

            cekongkir();
            return false;
        });

        $("#kabupaten").change(function () {
            var kab = $('#kabupaten').val();
            var url = "<?php echo site_url('alatbayarkurir/get_kecamatan_esoftplay/'); ?>" + kab;
            $('#kecamatan').load(url);

            cekongkir();
            return false;
        });

        $("#kabupaten").change(function () {
            cekongkir();
        });

        $("#kecamatan").change(function () {
            cekongkir();
        });

        $("#kurir").change(function () {
            cekongkir();
        });

        $("#beratbarang").on('change keydown paste input', function () {
            cekongkir();
        });

        $("#ongkir").change(function () {
            getOngkir();
        });
    });

    function getOngkir() {
        var ongkir = $('#ongkir').val();
        $('#ongkos').text(ongkir);
        var total = parseInt(50000) + parseInt(ongkir);
        $('#total').val(total);
    }
</script>