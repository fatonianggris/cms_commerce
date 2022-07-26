<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Halaman Produk</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Produk</a></li>
                <li class="breadcrumb-item active">Edit Produk</li>
            </ol>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <!-- Column -->
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <!-- Column -->
        <div class="card">
            <div class="card card-body">
                <h4 class="card-title">Formulir Edit Produk</h4>
                <h6 class="card-subtitle"> Silahkan mengisi daftar edit produk yang sesuai </h6>
                <form class="form-horizontal m-t-20 row" action="<?php echo site_url('produk/edit_produk/'. $produk[0]->id); ?>" enctype="multipart/form-data" method="post">          
                    <div class="form-group col-md-12 m-t-10">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" value="<?php echo $produk[0]->nama_produk; ?>" class="form-control" placeholder="Isikan nama produk anda"required>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Minimal Pembelian</label>
                        <div class="input-group">                            
                            <input type="number" name="min_pembelian" value="<?php echo $produk[0]->minimal_pembelian; ?>" class="form-control" placeholder="Isikan minimal pembelian produk anda" required data-validation-required-message="This field is required">
                            <div class="input-group-append">
                                <span class="input-group-text">Angka</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Kondisi Barang</label>
                        <select name="kondisi_barang"  class="form-control" required>                            
                            <option value="<?php echo $produk[0]->kondisi_barang; ?>" selected>
                                <?php
                                if ($produk[0]->kondisi_barang == 1) {
                                    echo 'Baru';
                                } else if ($produk[0]->kondisi_barang == 2) {
                                    echo 'Bekas';
                                }
                                ?>
                            </option>
                            <option value="1">Baru</option>
                            <option value="2">Bekas</option>  
                        </select>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Berat Barang</label>
                        <div class="input-group">                            
                            <input type="number" name="berat" value="<?php echo $produk[0]->berat; ?>" class="form-control" placeholder="Isikan berat produk anda (gr)" required data-validation-required-message="This field is required">
                            <div class="input-group-append">
                                <span class="input-group-text">Gram</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Kategori Barang</label>
                        <select name="kat_barang"  class="form-control" required>                            
                            <?php
                            if (!empty($kat)) {
                                foreach ($kat as $key => $value) {
                                    if ($produk[0]->kat_barang == $value->id) {
                                        ?>
                                        <option value="<?php echo $value->id; ?>" selected><?php echo $value->nama_kat; ?></option> 
                                        <?php
                                    } else {
                                        ?>
                                        <option value = "<?php echo $value->id; ?>"><?php echo $value->nama_kat; ?></option>  
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>                   
                    <div class="form-group col-md-6 m-t-10">
                        <label>Harga Barang</label>
                        <div class="input-group">                            
                            <input type="number" name="harga" value="<?php echo $produk[0]->harga_barang; ?>" class="form-control" placeholder="Isikan harga produk anda (Rp)" required data-validation-required-message="This field is required">
                            <div class="input-group-append">
                                <span class="input-group-text">Rupiah</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Stok Barang</label>
                        <div class="input-group">                            
                            <input type="number" name="stok_barang" value="<?php echo $produk[0]->stok; ?>" class="form-control" placeholder="Isikan stok produk anda" required data-validation-required-message="This field is required">
                            <div class="input-group-append">
                                <span class="input-group-text">Satuan</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-t-10">
                        <label>Produk Dari Toko</label>
                        <select name="produk_toko"  class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <?php
                            if (!empty($toko)) {
                                foreach ($toko as $key => $value) {
                                    if ($produk[0]->id_toko == $value->id) {
                                        ?>
                                        <option value="<?php echo $value->id; ?>" selected><?php echo $value->nama_toko; ?></option> 
                                        <?php
                                    } else {
                                        ?>
                                        <option value = "<?php echo $value->id; ?>"><?php echo $value->nama_toko; ?></option>  
                                        <?php
                                    }
                                }
                            }
                            ?>                        
                        </select>
                    </div>
                    <div class="form-group col-md-6 m-t-5">
                        <label>Status Rekomendasi</label>                   
                        <div class="custom-control custom-radio m-t-10">
                            <input type="radio" id="customRadio1" value="1" name="rekomendasi" class="custom-control-input" <?php echo ($produk[0]->rekomendasi == '1') ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="customRadio1">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" value="0" name="rekomendasi" class="custom-control-input" <?php echo ($produk[0]->rekomendasi == '0') ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="customRadio2">Tidak</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12 m-t-10">
                        <label>Deskripsi Barang</label>
                        <textarea name="desc_barang" id="desc" class="form-control" placeholder="Isikan deskripsi produk anda"  rows="5"><?php echo $produk[0]->desc_barang; ?></textarea>
                    </div>             
                    <div class="form-group col-md-10 m-t-10">
                        <label>Gambar Barang 1</label>
                        <input type="text" name="image1" value="<?php echo $produk[0]->gambar; ?>" style="display:none" />
                        <input type="text" name="image_thumb1" value="<?php echo $produk[0]->gambar_thumb; ?>" style="display:none" />
                        <input type="file" name="img1" class="form-control" aria-invalid="false">
                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                    </div>
                    <?php if ($produk[0]->gambar == true) {
                        ?>
                        <img width="100px" height="100px" src="<?php echo base_url() . $produk[0]->gambar_thumb; ?>">
                    <?php } ?>
                    <div class="form-group col-md-10 m-t-10">
                        <label>Gambar Barang 2</label>
                        <input type="text" name="image2" value="<?php echo $produk[0]->gambar_2; ?>" style="display:none" />
                        <input type="text" name="image_thumb2" value="<?php echo $produk[0]->gambar_2_thumb; ?>" style="display:none" />
                        <input type="file" name="img2" class="form-control" aria-invalid="false">
                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                    </div>
                    <?php if ($produk[0]->gambar_2 == true) {
                        ?>
                        <img width="100px" height="100px" src="<?php echo base_url() . $produk[0]->gambar_2_thumb; ?>">
                    <?php } ?>
                    <div class="form-group col-md-10 m-t-10">
                        <label>Gambar Barang 3</label>
                        <input type="text" name="image3" value="<?php echo $produk[0]->gambar_3; ?>" style="display:none" />
                        <input type="text" name="image_thumb3" value="<?php echo $produk[0]->gambar_3_thumb; ?>" style="display:none" />
                        <input type="file" name="img3" class="form-control" aria-invalid="false">
                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                    </div>
                    <?php if ($produk[0]->gambar_3 == true) {
                        ?>
                        <img width="100px" height="100px" src="<?php echo base_url() . $produk[0]->gambar_3_thumb; ?>">
                    <?php } ?>
                    <div class="form-group col-md-10  m-t-10">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                    </div>
                </form>             
            </div>
        </div>
    </div>
</div>
<!-- .row -->
<!-- Plugin JavaScript -->
