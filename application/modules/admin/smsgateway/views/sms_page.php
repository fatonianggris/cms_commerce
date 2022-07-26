<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman SMS Gateway</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">               
                <li><a href="#"> SMS Gateway</a></li>
                <li class="active">Manajemen SMS Gateway</li>
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
                <h3 class="box-title">Total Template Pesan</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-email text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_sms; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Pelanggan</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_pelanggan; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#edit_sms_config" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Config SMS </a>
                <h3 class="box-title m-b-0">Konfigurasi SMS</h3>
                <p class="text-muted m-b-10">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive pro-rd">
                    <table class="table" style="table-layout:fixed;">
                        <tbody class="text-dark">
                            <tr>
                                <td>Nama Pengirim</td>
                                <td><b><?php echo $sms[0]->nama_pengirim; ?></b></td>
                            </tr>
                            <tr>
                                <td>SMS Token</td>
                                <td style="word-wrap:break-word;"><?php echo $sms[0]->sms_token; ?></td>
                            </tr>
                            <tr>
                                <td>Device ID</td>
                                <td><?php echo $sms[0]->device_id; ?></td>
                            </tr>
                            <tr>
                                <td>SMSgateway Apps .apk</td>
                                <td>
                                    <a href="<?php echo base_url() . $sms[0]->file_apk; ?>" class="btn btn-default btn-sm"><i class="fa fa-download m-r-5"></i>download .apk </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr class="m-b-10">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Template Pesan SMS</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                      
                                <th>No.</th>                               
                                <th>Status Pesan</th>                              
                                <th>Isi Pesan</th>                               
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($pesan)) {
                                $i = 1;
                                foreach ($pesan as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $i; ?>.</td>
                                        <td><b><?php echo $value->status_pesan; ?></b></td>
                                        <td><?php echo $value->isi_pesan; ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#test_sms_<?php echo $value->status_pesan; ?>" ><button class="btn btn-outline btn-success btn-sm waves-effect waves-light"><i class="fa fa-send"></i></button></a>
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

<!-- /.modal -->
<div id="edit_sms_config" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Konfigurasi SMS Gateway</h4>
                <small>Edit SMS Gateway Website Anda </small>
            </div>
            <form class="form" action="<?php echo site_url('smsgateway/sms/update_sms'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Pengirim</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_pengirim" value="<?php echo $sms[0]->nama_pengirim; ?>" placeholder="Inputkan Nama Pengirim" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "LAZADA.CO.ID"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMS Token</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" name="sms_token" rows="5" placeholder="Inputkan SMS Token" required><?php echo $sms[0]->sms_token; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Device ID</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="device_id" value="<?php echo $sms[0]->device_id; ?>" placeholder="Inputkan Device ID" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "13178"</small>  
                        </div>
                    </div>     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMS Gateway Apps</label>
                        <div class="col-10">
                            <?php if ($sms[0]->file_apk == true) {
                                ?>
                                <input type="text" name="file_apk_temp" value="<?php echo $sms[0]->file_apk; ?>" style="display:none" />
                                <input type="file" id="input-file-now" name="file_apk" data-default-file="<?php echo base_url() . $sms[0]->file_apk; ?>" class="dropify" data-allowed-file-extensions="apk"/>
                            <?php } else { ?>          
                                <input type="text" name="file_apk_temp" value="" style="display:none" />
                                <input type="file" id="input-file-now" name="file_apk" data-default-file="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" class="dropify" data-allowed-file-extensions="apk" />
                            <?php } ?>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "file harus berformat .apk"</small>  
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

<div id="test_sms_pembayaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">SMS Pembayaran</h4>
                <small>Testing SMS Pembayaran</small>
            </div>
            <form class="form" action="<?php echo site_url('smsgateway/sms/test_sms_pembayaran'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nomor HP Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="no_hp" placeholder="Inputkan No Hanpdone Tester" id="tanya" required>
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

<div id="test_sms_pengiriman_konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">SMS Pengiriman & Konfirmasi</h4>
                <small>Testing SMS Pengiriman & Konfirmasi</small>
            </div>
            <form class="form" action="<?php echo site_url('smsgateway/sms/test_sms_pengiriman_konfirmasi'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nomor HP Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="no_hp" placeholder="Inputkan No Hanpdone Tester" id="tanya" required>
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

<div id="test_sms_pesanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">SMS Pesanan</h4>
                <small>Testing SMS Pesanan</small>
            </div>
            <form class="form" action="<?php echo site_url('smsgateway/sms/test_sms_pesanan'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nomor HP Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="no_hp" placeholder="Inputkan No Hanpdone Tester" id="tanya" required>
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

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
</script>
<script>
    $(".smtpauth").bootstrapSwitch();

    $(".smtpauth").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.smtpauth').attr('value', 'true');
        } else {
            $('.smtpauth').attr('value', 'false');
        }
    });

</script>