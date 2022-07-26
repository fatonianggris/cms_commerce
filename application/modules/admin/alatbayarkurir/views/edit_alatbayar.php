<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Alat Bayar</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list m-r-5"></i> Daftar Alat Bayar</a>
            <ol class="breadcrumb">
                <li><a href="#">Alat Bayar</a></li>               
                <li class="active">Edit Alat Bayar</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-md-12">
            <div class="white-box col-md-12">
                <form class="form" action="<?php echo site_url('alatbayarkurir/update_alatbayar/' . $alatbayar[0]->id_alatbayar); ?>" enctype="multipart/form-data" method="post">
                    <h3 class="box-title m-b-0">Fromulir Edit Alat Bayar "<?php echo $alatbayar[0]->nama_alatbayar; ?>"</h3>
                    <p class="text-muted m-b-30"> Bootstrap Form Validation</p>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tipealatbayar" class="control-label">Tipe Alat Bayar *</label>
                            <select class="form-control" name="tipe_alatbayar" id="tipealatbayar" required>
                                <option value="<?php echo $alatbayar[0]->tipe_alatbayar; ?>">
                                    <?php if ($alatbayar[0]->tipe_alatbayar == 1) { ?>
                                        Bank
                                    <?php } elseif ($alatbayar[0]->tipe_alatbayar == 2) { ?>
                                        E-Wallet
                                    <?php } ?>
                                </option>
                                <option value="1">Bank</option>
                                <option value="2">E-Wallet</option>
                            </select>                            
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for="namaalatbayar" class="control-label">Nama Jasa Alat Bayar *</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <input type="text" class="form-control" name="nama_alatbayar" value="<?php echo $alatbayar[0]->nama_alatbayar; ?>" id="namaalatbayar" placeholder="Isikan Nama Jasa" required>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Bank BCA, Gopay, OVO"</small>  

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">          
                            <label for="atasnama" class="control-label">Atas Nama Pemilik *</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" name="atas_nama" value="<?php echo $alatbayar[0]->atas_nama; ?>" id="atasnama" placeholder="Isikan Nama Pemilik" required>
                            </div>                          
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Rohan Abadi"</small>  

                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">          
                            <label for="nomoralatbayar" class="control-label">Nomor Alat Bayar *</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-key"></i></div>
                                <input type="number" class="form-control" name="nomor_alatbayar" value="<?php echo $alatbayar[0]->nomor_alatbayar; ?>" id="nomoralatbayar" placeholder="Isikan Nomor Alat Bayar" required>
                            </div>                            
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "0811192934"</small>  
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-12">Upload Logo Instansi *</label>
                            <div class="col-sm-12 ol-md-12 col-xs-12">
                                <div class="input-group">
                                    <input type="text" name="logo_temp" value="<?php echo $alatbayar[0]->logo_instansi ?>" style="display:none" />
                                    <input type="text" name="logo_temp_thumb" value="<?php echo $alatbayar[0]->logo_instansi_thumb; ?>" style="display:none" />
                                    <?php if ($alatbayar[0]->logo_instansi == NULL) { ?>
                                        <input type="file" id="input-file-now" name="logo_instansi" data-default-file="<?php echo base_url() . $alatbayar[0]->logo_instansi_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                                    <?php } else { ?>
                                        <input type="file" id="input-file-now" name="logo_instansi" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                                    <?php } ?>
                                </div>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 1Mb (logo diutamakan resolusi 150*50 pixel)"</small>  
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <h3 class="box-title m-b-10"> INFORMASI TAMBAHAN</h3>                  
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                            <div class="panel panel-green">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            CATATAN UNTUK TRANSFER *klik disini
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="form-group"> 
                                                <label class="control-label">Catatan Transfer Untuk Pelanggan *</label>
                                                <textarea class="form-control" rows="10" id="catatan" name="catatan_transfer"><?php echo $alatbayar[0]->catatan_transfer; ?></textarea>
                                                <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "1. Pembayaran ditunggu paling lambat 24 jam setelah pemesanan Anda. Lebih dari itu, pesanan Anda otomatis akan dibatalkan oleh sistem.</br>
                                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 2. Apabila ada gangguan teknis pembayaran, Anda dapat langsung menghubungi customer service Dekoruma.com melalui telepon di (021) 5332433."</small>  
                                            </div>  
                                        </div>                           
                                    </div>
                                </div>
                            </div>             
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                            <div class="panel panel-green">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            PETUNJUK CARA TRANSFER *klik disini
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="form-group"> 
                                                <label class="control-label">Petunjuk Transfer Untuk Pelanggan *</label>
                                                <textarea class="form-control" rows="10" id="petunjuk" name="petunjuk_transfer"><?php echo $alatbayar[0]->petunjuk_transfer; ?></textarea>
                                                <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "1. Masukkan kartu ATM kemudian masukkan nomor PIN Anda</br>
                                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 2. Pilih "Transaksi lainnya", kemudian pilih "Transfer"</br>
                                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 3. Silahkan masukkan no. BCA Virtual Account (74102000XXXXXXXX), lalu tekan "Benar"</br>
                                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 4. Periksa kembali data transaksi kemudian tekan "Benar"</br>
                                                    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 5. Simpan struk Anda sebagai bukti pembayaran. Penjual akan menerima notifikasi pembayaran."</small>  

                                            </div>
                                        </div>                           
                                    </div>
                                </div>
                            </div>             
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <button type="submit" id="uploadfiles" class="btn btn-success"><i class="fa fa-send m-r-5"></i>Submit</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-close m-r-5"></i>Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
