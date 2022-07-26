
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Edit Produk</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/daftar_produk'); ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list m-r-5"></i> Daftar Produk</a>
            <ol class="breadcrumb">
                <li><a href="#">Produk</a></li>             
                <li class="active">Edit Produk</li>
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
                <form class="form" data-toggle="validator" action="<?php echo site_url('produk/update_produk/' . $edit_produk[0]->id_produk); ?>" enctype="multipart/form-data" method="post">
                    <h3 class="box-title m-b-0">Formulir Edit Produk "<?php echo ucwords($edit_produk[0]->nama_produk); ?>"</h3>
                    <p class="text-muted m-b-30"> Silahkan Isi Kriteria Produk Anda Disini..</p>
                    <div class="col-md-12">
                        <h3 class="box-title m-b-10">Informasi Utama Produk</h3>                 
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                            <div class="panel panel-green">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                            *WAJIB DIISI
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <div class="form-group" > 
                                                    <label for="namaproduk" class="control-label">Nama Produk *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-package"></i></div>
                                                        <input type="text" name="token" value="<?php echo $edit_produk[0]->token; ?>" style="display:none" />
                                                        <input type="text" name="nama_produk" value="<?php echo ucwords($edit_produk[0]->nama_produk); ?>" class="form-control" id="namaproduk" placeholder="Inputkan Nama Produk" required>
                                                    </div>                           
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Ambarawa Outer Kayu"</small>  
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" > 
                                                    <label for="skuproduk" class="control-label">SKU Produk *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-receipt"></i></div>                                  
                                                        <input type="text" name="sku_produk" class="form-control" value="<?php echo ucwords($edit_produk[0]->sku_produk); ?>" id="skuproduk" placeholder="Inputkan SKU" required >
                                                    </div>                           
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, </small>    
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">          
                                                    <label class="control-label">Jadikan Rekomendasi? *</label>
                                                    <div class="input-group">
                                                        <?php if ($edit_produk[0]->status_rekomendasi == 1) { ?>
                                                            <input type="checkbox" class="rekomen" checked value="1" name="status_rekomendasi" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="rekomen" value="0" name="status_rekomendasi" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                        <?php } ?>
                                                    </div>
                                                    <small class="form-text">*Masuk produk rekomendasi</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">          
                                                    <label for="bahanproduk" class="control-label">Bahan Produk *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-paint-bucket"></i></div>
                                                        <input type="text" name="bahan_produk" value="<?php echo $edit_produk[0]->bahan_produk; ?>" class="form-control" id="bahanproduk" placeholder="Inputkan Bahan Produk" required>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Katun, Combed, Kayu, Wol, Satin"</small> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="minbeli" class="control-label">Minimal Pembelian *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-shopping-cart"></i></div>
                                                        <input type="number" min="1" name="minimal_pembelian" value="<?php echo $edit_produk[0]->minimal_pembelian; ?>" class="form-control" id="minbeli" placeholder="Min. Pembelian" required>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="stokbarang" class="control-label">Stok Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-harddrives"></i></div>
                                                        <input type="number" min="1" name="stok_barang" value="<?php echo $edit_produk[0]->stok_barang; ?>" class="form-control" id="stokbarang" placeholder="Stok Barang" required>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                                                </div>
                                            </div>                  

                                            <div class="col-md-2">
                                                <div class="form-group">          
                                                    <label class="control-label">Jadikan Promo? *</label>                           
                                                    <div class="input-group">
                                                        <?php if ($edit_produk[0]->status_promo == 1) { ?>
                                                            <input type="checkbox" class="promo" name="status_promo" checked data-on-text="YA" value="1" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="promo" name="status_promo" data-on-text="YA" value="0" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                        <?php } ?>
                                                    </div>
                                                    <small class="form-text">*Masuk produk promo</small> 
                                                </div>
                                            </div>
                                        </div>   

                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="beratbarang" class="control-label">Berat Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <input class="form-control" name="berat_barang" type="number" value="<?php echo $edit_produk[0]->berat_barang; ?>"  placeholder="Berat Barang" min="1" id="beratbarang" required>                              
                                                        <span class="input-group-addon" id="basic-addon1">gram</span>
                                                    </div>                          
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "1000 gram"</small> 
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="kodisibarang" class="control-label">Kondisi Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="form-control" name="kondisi_barang" data-placeholder="Inputkan Kondisi Barang" id="kodisibarang" required>
                                                        <?php if ($edit_produk[0]->kondisi_barang == 0) { ?>
                                                            <option value="0">Tidak Ada (*tanpa kondisi)</option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $edit_produk[0]->kondisi_barang; ?>">
                                                                <?php if ($edit_produk[0]->kondisi_barang == 1) { ?>
                                                                    Baru
                                                                <?php } else { ?>
                                                                    Bekas
                                                                <?php } ?>
                                                            </option>
                                                            <option value="0">Tidak Ada (*tanpa kondisi)</option>
                                                        <?php } ?>

                                                        <option value="1">Baru</option>
                                                        <option value="2">Bekas</option>
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="merekbarang" class="control-label">Merek Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="form-control required" name="merek_barang" id="merekbarang" required>
                                                        <?php if ($edit_produk[0]->merek_barang == 0) { ?>
                                                            <option value="0">Tidak Ada (*tanpa merek)</option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $edit_produk[0]->merek_barang; ?>"><?php echo strtoupper($edit_produk[0]->nama_merek); ?></option>
                                                            <option value="0">Tidak Ada (*tanpa merek)</option>
                                                        <?php } ?>
                                                        <?php
                                                        if (!empty($merek)) {
                                                            foreach ($merek as $key => $value) {
                                                                ?> 
                                                                <option value="<?php echo $value->id_merek; ?>"><?php echo strtoupper($value->nama_merek); ?></option>
                                                                <?php
                                                            }  //ngatur nomor urut
                                                        }
                                                        ?>     
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Merek)</small> 
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="asalproduk" class="control-label">Asal Produk *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="form-control" id="asalproduk" name="asal_produk" required>
                                                        <?php if ($edit_produk[0]->asal_produk == 0) { ?>
                                                            <option value="0">Tidak Ada (*tanpa asal produk)</option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $edit_produk[0]->asal_produk; ?>">
                                                                <?php if ($edit_produk[0]->asal_produk == 1) { ?>
                                                                    Lokal
                                                                <?php } else { ?>
                                                                    Impor
                                                                <?php } ?>
                                                            </option>
                                                            <option value="0">Tidak Ada (*tanpa asal produk)</option>
                                                        <?php } ?>
                                                        <option value="1">Lokal</option>
                                                        <option value="2">Impor</option>
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                                                </div>
                                            </div>                     
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="kategoribarang" class="control-label">Kategori Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="form-control required" name="kategori_barang" id="kategoribarang" required>
                                                        <option value="<?php echo $edit_produk[0]->kategori_barang; ?>"><?php echo strtoupper($edit_produk[0]->nama_kategori); ?></option>
                                                        <?php
                                                        if (!empty($kategori)) {
                                                            foreach ($kategori as $key => $value) {
                                                                ?> 
                                                                <option value="<?php echo $value->id_kategori; ?>"><?php echo strtoupper($value->nama_kategori); ?></option>
                                                                <?php
                                                            }  //ngatur nomor urut
                                                        }
                                                        ?>     
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Kategori & Tag)</small> 
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="voucher" class="control-label">Voucher? *</label>
                                                    <select class="form-control" id="voucher" name="voucher" required> 
                                                        <?php if ($edit_produk[0]->voucher != 0) { ?>
                                                            <option value="<?php echo $edit_produk[0]->voucher; ?>"><?php echo $edit_produk[0]->kode_voucher; ?> (<?php echo $edit_produk[0]->potongan; ?>%)</option>
                                                            <option value="0">Tidak Ada (*tanpa voucher)</option>
                                                            <?php foreach ($voucher as $key => $value) {
                                                                ?> 
                                                                <option value="<?php echo $value->id_voucher; ?>"><?php echo strtoupper($value->kode_voucher); ?> (<?php echo strtoupper($value->potongan); ?>%)</option>
                                                                <?php
                                                            }  //ngatur nomor urut
                                                        } else {
                                                            ?>    
                                                            <option value="0">Tidak Ada (*tanpa voucher)</option>
                                                            <?php foreach ($voucher as $key => $value) {
                                                                ?> 
                                                                <option value="<?php echo $value->id_voucher; ?>"><?php echo strtoupper($value->kode_voucher); ?> (<?php echo strtoupper($value->potongan); ?>%)</option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <small class="form-text">*Pilih voucher yang tersedia, (jika belum ada silahkan tambahkan di menu Voucher) </small> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tag Barang *</label>
                                                    <input type="text" name="tag_barang" value="<?php echo $edit_produk[0]->tag_barang; ?>" data-role="tagsinput" placeholder="Inputkan Tag" />                          
                                                    <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "celanajeans, boyfriendjeans, celanawanita, OOTD"</small>
                                                </div>
                                            </div> 

                                        </div> 
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ukuranbarang" class="control-label">Ukuran Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="select2 select2-multiple required" name="ukuran_barang[]" id="ukuranbarang" multiple="multiple" data-placeholder="Inputkan Ukuran Barang" required>                                 
                                                        <?php if ($edit_produk[0]->ukuran_barang == 0) {
                                                            ?>
                                                            <option value="0" selected >Tidak Ada (*tanpa ukuran)</option>
                                                        <?php } else { ?>
                                                            <option value="0" >Tidak Ada (*tanpa ukuran)</option>
                                                        <?php } ?>
                                                        <?php
                                                        $id_ukuran = $edit_produk[0]->ukuran_barang;
                                                        $id_array_ukuran = explode(',', $id_ukuran);
                                                        if (!empty($size)) {
                                                            foreach ($size as $key => $value) {
                                                                if (in_array($value->id_size, $id_array_ukuran)) {
                                                                    ?>
                                                                    <option value="<?php echo $value->id_size; ?>" selected><?php echo strtoupper($value->nama_size); ?></option> 
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value = "<?php echo $value->id_size; ?>"><?php echo strtoupper($value->nama_size); ?></option>  
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi sesuai ukuran produk yang tersedia (jika belum ada silahkan tambahkan di menu Size & Warna)</small> 
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="warnabarang" class="control-label">Warna Barang *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="select2 select2-multiple required" name="warna_barang[]" id="warnabarang" multiple="multiple" data-placeholder="Inputkan Warna Barang" required>                            
                                                        <?php if ($edit_produk[0]->warna_barang == 0) {
                                                            ?>
                                                            <option value="0" selected >Tidak Ada (*tanpa warna)</option>
                                                        <?php } else { ?>
                                                            <option value="0" >Tidak Ada (*tanpa warna)</option>
                                                        <?php } ?>
                                                        <?php
                                                        $id_warna = $edit_produk[0]->warna_barang;
                                                        $id_array_warna = explode(',', $id_warna);
                                                        if (!empty($warna)) {
                                                            foreach ($warna as $key => $value) {
                                                                if (in_array($value->id_warna, $id_array_warna)) {
                                                                    ?>
                                                                    <option value="<?php echo $value->id_warna; ?>" selected><?php echo strtoupper($value->nama_warna); ?></option> 
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value = "<?php echo $value->id_warna; ?>"><?php echo strtoupper($value->nama_warna); ?></option>  
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>                                         
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi sesuai warna produk yang tersedia (jika belum ada silahkan tambahkan di menu Size & Warna)</small> 
                                                </div>
                                            </div>  
                                        </div>
                                    </div>  
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-12">
                            <h3 class="box-title m-b-10">Informasi Harga Produk</h3>                  
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">  
                                <div class="panel panel-green">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                *WAJIB DIISI
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo"  class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="hargabarang" class="control-label">Harga Barang *</label>
                                                        <div class="help-block with-errors"></div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                                            <input class="form-control" name="harga_barang" value="<?php echo $edit_produk[0]->harga_barang; ?>" type="text" id="hargabarang" placeholder="Inputkan Harga" data-mask="000.000.000.000.000" data-mask-reverse="true" required>                               
                                                        </div>
                                                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small> 
                                                    </div>
                                                </div>   
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Potongan Promo *</label>
                                                        <div class="help-block with-errors"></div>
                                                        <div class="input-group">                                
                                                            <input type="number" min="1" max="100" name="potongan_harga" value="<?php echo $edit_produk[0]->potongan_harga; ?>" class="form-control" id="pot_harga" placeholder="Persentase" required>
                                                            <span class="input-group-addon" id="basic-addon1">%</span>
                                                        </div>
                                                        <small class="form-text">*Masukan potongan promo</small> 
                                                    </div>
                                                </div>                  
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Harga Promo *</label>                          
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                                            <input class="form-control" name="harga_promo" type="text" value="<?php echo $edit_produk[0]->harga_promo; ?>"  placeholder="0.00" data-mask-reverse="true" readonly >                               
                                                        </div>
                                                        <small class="form-text">*Harga setelah terpotong</small> 
                                                    </div>
                                                </div>   
                                                <div class="col-md-2">
                                                    <div class="form-group">          
                                                        <label class="control-label">Sembunykan Harga? *</label>
                                                        <div class="input-group">
                                                            <?php if ($edit_produk[0]->status_sensor_harga == 1) { ?>
                                                                <input type="checkbox" class="sensor" name="status_sensor_harga" checked data-on-text="YA" value="1" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                            <?php } else { ?>
                                                                <input type="checkbox" class="sensor" name="status_sensor_harga" data-on-text="YA" value="0" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                            <?php } ?>
                                                        </div>
                                                        <small class="form-text">*Digit harga disembunyikan</small> 
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="startdigit" class="control-label">Digit Awal</label>
                                                        <div class="help-block with-errors"></div>
                                                        <div class="input-group">                                   
                                                            <input type="number" min="1" name="start_digit" value="<?php echo $edit_produk[0]->start_digit; ?>" class="form-control" id="startdigit" placeholder="" required>
                                                        </div>
                                                        <small class="form-text">*Start index</small> 
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="enddigit" class="control-label">Digit Akhir</label>
                                                        <div class="help-block with-errors"></div>
                                                        <div class="input-group">                                   
                                                            <input type="number" min="1" name="end_digit" value="<?php echo $edit_produk[0]->end_digit; ?>" class="form-control" id="enddigit" placeholder="" required>
                                                        </div>
                                                        <small class="form-text">*Batas index</small> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Hasil Sensor Harga*</label>
                                                        <div class="help-block with-errors"></div>
                                                        <div class="input-group">          
                                                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                                            <input type="text" class="form-control" name="tampilan_sensor" placeholder="Hasil Harga" readonly="">
                                                        </div>
                                                        <small class="form-text">*Tampilan Harga Disensor</small> 
                                                    </div>
                                                </div>                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="box-title m-b-10">Detail Informasi Produk</h3>                  
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                                <div class="panel panel-green">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                                *WAJIB DIISI
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Spesifikasi Barang</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="spesifikasiproduk" rows="10" name="spesifikasi_barang"><?php echo $edit_produk[0]->spesifikasi_barang; ?></textarea>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "1. Material bahan Silk, dengan karakteristik bahan yang halus, lembut, dingin serta menyerap keringat dan mewah ketika dipakai.</br>
                                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; 2. Pemakaian User Friendly "</small>  
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Upload Foto/Gambar Produk *</label>
                                                    <div class="form-group">
                                                        <div id="my-dropzone" class="dropzone">

                                                        </div>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (Drop/Klik untuk mengupload), "MAX upload 5 file berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 550*680)"</small>  
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                        <div class="col-md-12">
                            <h3 class="box-title m-b-10">Informasi Online Shop (TIDAK WAJIB DIISI)</h3>                  
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                                <div class="panel panel-green">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                *Klik disini
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="form-group"> 
                                                    <label class="control-label">Link Shopee</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                                        <input type="text" class="form-control" value="<?php echo $edit_produk[0]->link_shopee; ?>" name="link_shopee" placeholder="Inputkan Link Shopee" >
                                                    </div>

                                                    <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "https://shopee.co.id/Sepatu-Sneaker-Pria-NK-02-i.11461206.6304540536" (copy link produk anda)</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group"> 
                                                    <label class="control-label">Link Tokopedia</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                                        <input type="text" class="form-control" value="<?php echo $edit_produk[0]->link_tokopedia; ?>" name="link_tokopedia" placeholder="Inputkan Link Tokopedia" >
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "https://www.tokopedia.com/bata-official/bata-sepatu-wanita-crystal-5525152-37" (copy link produk anda)</small>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group"> 
                                                    <label class="control-label">Link Lazada</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                                        <input type="text" class="form-control" value="<?php echo $edit_produk[0]->link_lazada; ?>" name="link_lazada" placeholder="Inputkan Link Lazada" >
                                                    </div>

                                                    <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "https://www.lazada.co.id/products/lapak-pangeran-termurah-sepatu-slip-on-real-pict-100-i516248556-s1216072849.html" (copy link produk anda)</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group"> 
                                                    <label class="control-label">Link Bukalapak</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                                        <input type="text" class="form-control" value="<?php echo $edit_produk[0]->link_bukalapak; ?>" name="link_bukalapak" placeholder="Inputkan Link Bukalapak" >
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*TIDAK</b> wajib disi, <b class="text-danger">Contoh :</b> "https://www.bukalapak.com/p/fashion-pria/sepatu-169/sneaker-pria/185d8qp-jual-ambigo-air-elioski-n2-running-shoes-sepatu-olahraga-pria-sepatu-lari-jogging-sepatu-sneakers-pria" (copy link produk anda)</small>                                              
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>             
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success uploadfiles"><i class="fa fa-send m-r-5"></i>Submit</button>
                                <button type="reset" class="btn btn-warning"><i class="fa fa-close m-r-5"></i>Cancel</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
    jQuery(document).ready(function () {
        $("#merekbarang").select2();
        $("#kategoribarang").select2();
        $("#warnabarang").select2();
        $("#ukuranbarang").select2();
        $("#voucher").select2();
    });
</script>
<!--<script>
    $("#namaproduk").on('input', function () {
        let acronym = $(this).val().split(/\s/).reduce((response, word) => response += word.slice(0, 1), '').toUpperCase();
        var id_sku = acronym + "-" + $('#kategoribarang').val() + "-" + <?php echo $edit_produk[0]->id_produk; ?>;
        $('input[name="sku_produk"]').val(id_sku);
    });

    $(document).ready(function () {
        $("#kategoribarang").change(function () {
            let acronym = $('#namaproduk').val().split(/\s/).reduce((response, word) => response += word.slice(0, 1), '').toUpperCase();
            var id_sku = acronym + "-" + $(this).val() + "-" + <?php echo $edit_produk[0]->id_produk; ?>;
            $('input[name="sku_produk"]').val(id_sku);
        });
    });
</script>-->
<script>
    String.prototype.replaceAt = function (i, j) {
        return this.substr(0, i - 1) + "x".repeat(j - i + 1) + this.substr(j, this.length);
    };

    $(".sensor").bootstrapSwitch();
    var str_digit = $('input[name="start_digit"]');
    var end_digit = $('input[name="end_digit"]');
    var show_sensor = $('input[name="tampilan_sensor"]')

<?php if ($edit_produk[0]->status_sensor_harga == 1) { ?>
        str_digit.prop('disabled', false);
        end_digit.prop('disabled', false);

        var pot = $('#hargabarang').val().replace(/\./g, '');
        pot = pot.replaceAt($('#startdigit').val(), $('#enddigit').val());
        $('input[name="tampilan_sensor"]').val(pot);
<?php } else { ?>
        str_digit.prop('disabled', true);
        end_digit.prop('disabled', true);
<?php } ?>

    $(".sensor").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            str_digit.prop('disabled', false);
            end_digit.prop('disabled', false);
            $('.sensor').attr('value', '1');
        } else {
            str_digit.prop('disabled', true);
            end_digit.prop('disabled', true);
            show_sensor.val("");
            str_digit.val("");
            end_digit.val("");
            $('.sensor').attr('value', '0');
        }
    });

    $("#startdigit").on('input', function () {
        if ($(this).val().length) {
            var pot = $('#hargabarang').val().replace(/\./g, '');
            pot = pot.replaceAt($(this).val(), $('#enddigit').val());
            $('input[name="tampilan_sensor"]').val(pot);
        } else {
            $('input[name="tampilan_sensor"]').val("0");
        }
    });

    $("#enddigit").on('input', function () {
        if ($(this).val().length) {
            var pot = $('#hargabarang').val().replace(/\./g, '');
            pot = pot.replaceAt($('#startdigit').val(), $(this).val());
            $('input[name="tampilan_sensor"]').val(pot);
        } else {
            $('input[name="tampilan_sensor"]').val("0");
        }
    });

</script>
<script>
    $(".rekomen").bootstrapSwitch();
    $(".promo").bootstrapSwitch();
    var potongan = $('input[name="potongan_harga"]');
    var promo = $('input[name="harga_promo"]');

<?php if ($edit_produk[0]->status_promo == 1) { ?>
        potongan.prop('disabled', false);
        promo.prop('disabled', false);
<?php } else { ?>
        potongan.prop('disabled', true);
        promo.prop('disabled', true);
<?php } ?>

    $(".rekomen").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.rekomen').attr('value', '1');
        } else {
            $('.rekomen').attr('value', '0');
        }

    });
    $(".promo").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('input[name="potongan_harga"]').prop('disabled', false);
            $('.promo').attr('value', '1');
            $('.uploadfiles').attr('disabled', true);
        } else {
            $('.uploadfiles').attr('disabled', false);
            $('input[name="potongan_harga"]').prop('disabled', true);
            $('input[name="potongan_harga"]').val("");
            $('input[name="harga_promo"]').val("0.00");
            $('.promo').attr('value', '0');
        }

    });


    $('#pot_harga').on('input', function () {
        if ($(this).val().length) {
            var pot = $('#hargabarang').val().replace(/\./g, '') - (($(this).val() / 100) * $('#hargabarang').val().replace(/\./g, ''));
            $('input[name="harga_promo"]').prop('disabled', false);
            $('input[name="harga_promo"]').prop('readonly', true);
            $('.uploadfiles').attr('disabled', false);
            if (pot >= 0) {
                $('input[name="harga_promo"]').val(pot);
            } else {
                $('input[name="harga_promo"]').val("0.00");
            }
        } else {

            $('input[name="harga_promo"]').prop('disabled', true);
            $('input[name="harga_promo"]').val("0.00");
        }
    });
    $('#hargabarang').on('input', function () {
        if ($(this).val().length) {
            if (($("#startdigit").val().length) || ($("#enddigit").val().length)) {
                var pot = $(this).val().replace(/\./g, '');
                pot = pot.replaceAt($("#startdigit").val(), $('#enddigit').val());
                $('input[name="tampilan_sensor"]').val(pot);
            }
            var pot = $(this).val().replace(/\./g, '') - (($('#pot_harga').val() / 100) * $(this).val().replace(/\./g, ''));
            if (pot >= 0) {
                if ($('#pot_harga').val() == 0) {
                    $('input[name="harga_promo"]').val("0.00");
                } else {
                    $('input[name="harga_promo"]').val(pot);
                }
            } else {
                $('input[name="harga_promo"]').val("0.00");
            }
        }
    });</script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropzone-master/dist/dropzone.js"></script>
<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "<?php echo site_url("produk/upload/") ?>",
        acceptedFiles: "image/*",
        autoProcessQueue: false,
        maxFilesize: 2,
        maxFiles: 5,
        parallelUploads: 5,
        paramName: "file",
        addRemoveLinks: true,
        removedfile: function (file) {
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin mengahapus gambar ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    var name = file.name;
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("produk/remove") ?>",
                        data: {file: name},
                        dataType: 'html',
                        success: function (result) {
                            swal("Terhapus!", "Gambar telah terhapus.", "success");
                            // remove the thumbnail
                            var previewElement;
                            return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
                        },
                        error: function (result) {
                            swal("Opsss!", "No Network connection.", "error");
                        }
                    });
                } else {
                    swal("Dibatakan!", "Gambar gagal terhapus.", "error");
                }
            });
        },
        init: function () {
            var me = this;
            $.get("<?php echo site_url("produk/list_files/" . $edit_produk[0]->token) ?>", function (data) {
                // if any files already in server show all here
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        var mockFile = value;
                        me.emit("addedfile", mockFile);
                        me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/produk/thumbs/" + value.name);
                        me.emit("complete", mockFile);
                    });
                }

            });
        }
    });
    //Event ketika Memulai mengupload
    myDropzone.on("sending", function (a, b, c) {
        a.token = "<?php echo $edit_produk[0]->token; ?>";
        c.append("token", a.token); //Menmpersiapkan token untuk masing masing foto
    });
    $('.uploadfiles').click(function () {
        myDropzone.processQueue();
    });

</script>

