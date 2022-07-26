<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman General Page</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-tambahbanner" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Banner </a>
            <ol class="breadcrumb">               
                <li><a href="#"> General Page</a></li>
                <li class="active">Manajemen General Page</li>
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
                <h3 class="box-title">Total Banner</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-ticket text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_banner; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->
    <div>
        <div class="col-sm-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#edit_generalpage" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Edit General Page </a>
                <a href="" data-toggle="modal" data-target="#edit_seopage" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Edit SEO Page </a>
                <a href="<?php echo site_url('sitemap/'); ?>" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-refresh m-r-5"></i>Update sitemap.xml </a>
                <div class="tab-pane" id="profile">                    
                    <h3 class="box-title m-b-0">Detail General Website</h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Logo Website</strong>
                            <br>
                            <a href="<?php echo base_url() . $generalpage[0]->logo_website; ?>" class="image-popup-fit-width" title="">                         
                                <img src="<?php echo base_url() . $generalpage[0]->logo_website; ?>" alt="Owl Image" width="120" height="50">
                            </a>
                        </div>   
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Nama Website</strong>
                            <br>
                            <p class="text-muted"><?php echo $generalpage[0]->nama_website; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Contact Bussiness</strong>
                            <br>
                            <p class="text-muted"><?php echo $generalpage[0]->contact_bussines; ?></p>
                        </div>                        
                        <div class="col-md-3 col-xs-3"> <strong>Greeting Website</strong>
                            <br>
                            <p class="text-muted"><?php echo $generalpage[0]->greeting_website; ?></p>
                        </div>                        
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 col-xs-12 b-r"> <strong>Tentang Website</strong>
                            <br>
                            <p class="text-muted"><?php echo $generalpage[0]->about_website; ?></p>
                        </div>                       
                    </div>
                    <hr>
                    <h3 class="box-title m-b-0">Konfigurasi SEO Website</h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-2 col-xs-2 b-r"> <strong>Icon SEO</strong>
                            <br>
                            <a href="<?php echo base_url() . $seopage[0]->gambar_page_seo; ?>" class="image-popup-fit-width" title="">                         
                                <img src="<?php echo base_url() . $seopage[0]->gambar_page_seo; ?>" alt="Owl Image" width="50" height="50">
                            </a>
                        </div>   
                        <div class="col-md-2 col-xs-2 b-r"> <strong>Judul SEO</strong>
                            <br>
                            <p class="text-muted"><?php echo $seopage[0]->judul_page_seo; ?></p>
                        </div>
                        <div class="col-md-2 col-xs-2 b-r"> <strong>ID Twitter</strong>
                            <br>
                            <p class="text-muted"><?php echo $seopage[0]->id_twitter; ?></p>
                        </div>                        
                        <div class="col-md-2 col-xs-2 b-r"> <strong>Keywords</strong>
                            <br>
                            <p class="text-muted">
                                <?php
                                $id_array_tag = explode(',', $seopage[0]->keywords);
                                if (!empty($id_array_tag)) {
                                    foreach ($id_array_tag as $key) {
                                        ?>
                                        <span class="label label-info label-detail"><?php echo strtolower($key); ?></span> 
                                        <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>   
                        <div class="col-md-2 col-xs-2 b-r"> <strong>Copyright Website</strong>
                            <br>
                            <p class="text-muted"><?php echo $seopage[0]->copyright; ?></p>
                        </div>   
                        <div class="col-md-2 col-xs-2"> <strong>Canonical SEO</strong>
                            <br>
                            <p class="text-muted"><?php echo $seopage[0]->canonical; ?></p>
                        </div>   
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-8 col-xs-12 b-r"> <strong>Deskripsi SEO</strong>
                            <br>
                            <p class="text-muted"><?php echo $seopage[0]->deskripsi_page; ?></p>
                        </div> 
                        <div class="col-md-2 col-xs-2 b-r"> <strong>Status Robot</strong>
                            <br>
                            <p class="text-muted">
                                <?php if ($seopage[0]->status_robot == 1) { ?>
                                    <span class="label label-success label-detail">AKTIF</span>
                                <?php } else { ?>
                                    <span class="label label-danger label-detail">TIDAK AKTIF</span>
                                <?php } ?>                               
                            </p>
                        </div>   
                        <div class="col-md-2 col-xs-2"> <strong>Status Boosting</strong>
                            <br>
                            <p class="text-muted">
                                <?php if ($seopage[0]->status_boosting == 1) { ?>
                                    <span class="label label-success label-detail">AKTIF</span>
                                <?php } else { ?>
                                    <span class="label label-danger label-detail">TIDAK AKTIF</span>
                                <?php } ?>  
                            </p>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Banner Website</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                      
                                <th>Status Banner</th>                               
                                <th>Judul Banner</th>                              
                                <th>Judul Promo</th>
                                <th>Konten</th>
                                <th>Highlight</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($banner)) {
                                foreach ($banner as $key => $value) {
                                    ?> 
                                    <tr>
                                        <?php if ($value->status_banner == 1) { ?>
                                            <td><span class="label label-success">AKTIF</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-default">NON AKTIF</span></td>
                                        <?php } ?>
                                        <?php
                                        $words_banner = explode(" ", strip_tags($value->judul_banner));
                                        $limit_banner = implode(" ", array_splice($words_banner, 0, 5));
                                        ?>                                       
                                        <td><?php echo strtoupper($limit_banner); ?></td>
                                        <?php
                                        $words_promo = explode(" ", strip_tags($value->judul_promo));
                                        $limit_promo = implode(" ", array_splice($words_promo, 0, 3));
                                        ?>   
                                        <td><?php echo strtoupper($limit_promo); ?></td>
                                        <?php
                                        $words_konten = explode(" ", strip_tags($value->konten));
                                        $limit_konten = implode(" ", array_splice($words_konten, 0, 3));
                                        ?>   
                                        <td><?php echo strtoupper($limit_konten); ?></td>
                                        <?php
                                        $words_highlight = explode(" ", $value->highlight);
                                        $limit_highlight = implode(" ", array_splice($words_highlight, 0, 4));
                                        ?>
                                        <td><?php echo $limit_highlight; ?></td>
                                        <td>
                                            <a href="#lihat_banner<?php echo $value->id_banner; ?>" data-toggle="modal" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
                                            <a href="#edit_banner<?php echo $value->id_banner; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_banner(<?php echo $value->id_banner; ?>, '<?php echo strtoupper($value->judul_banner); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
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
<!-- /.modal -->
<div id="edit_generalpage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit General Page Website</h4>
                <small>Edit Deskripsi General Page Website Anda </small>
            </div>
            <form class="form" action="<?php echo site_url('pengaturan/generalpage/update_generalpage'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_website" value="<?php echo $generalpage[0]->nama_website; ?>" placeholder="Inputkan Nama Toko Website" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Contact Bussiness</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="contact_bussines" value="<?php echo $generalpage[0]->contact_bussines; ?>" placeholder="Inputkan Nomor Telephone Bisnis" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Ucapan/Greeting Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="greeting_website" value="<?php echo $generalpage[0]->greeting_website; ?>" placeholder="Inputkan Ucapan/Greeting Website" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Selamat Datang di Website ABANG SHOP, Selamat Berbelanja"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Logo Website</label>
                        <div class="col-10">
                            <?php if ($generalpage[0]->logo_website == true) {
                                ?>
                                <input type="text" name="logo_temp" value="<?php echo $generalpage[0]->logo_website; ?>" style="display:none" />
                                <input type="text" name="logo_temp_thumb" value="<?php echo $generalpage[0]->logo_website_thumb; ?>" style="display:none" />
                                <input type="file" id="input-file-now" name="logo_website" data-default-file="<?php echo base_url() . $generalpage[0]->logo_website_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                            <?php } else { ?>          
                                <input type="text" name="logo_temp" value="" style="display:none" />
                                <input type="text" name="logo_temp_thumb" value="" style="display:none" />
                                <input type="file" id="input-file-now" name="logo_website" data-default-file="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                            <?php } ?>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (logo diutamakan resolusi 1000*700 pixel)"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">About Website/Toko</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="5" name="about_website"><?php echo $generalpage[0]->about_website; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Semua dampak besar berawal dari satu langkah kecil. Selama 10 tahun perjalanan Tokopedia, kami telah melewati tantangan demi tantangan, langkah demi langkah, hingga akhirnya sampai pada titik ini. Kami percaya bahwa kesuksesan tidak bisa dicapai tanpa sebuah langkah kecil.</small>  
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
<div id="edit_seopage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit SEO Page Website</h4>
                <small>Edit SEO Page Website Anda </small>
            </div>
            <form class="form" action="<?php echo site_url('pengaturan/generalpage/update_seopage'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Aktifkan Robot SEO</label>
                        <div class="col-10">
                            <?php if ($seopage[0]->status_robot == 1) { ?>
                                <input type="checkbox" class="robot" checked value="1" name="status_robot" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                            <?php } else { ?>
                                <input type="checkbox" class="robot" value="0" name="status_robot" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                            <?php } ?>
                            <small class="form-text">*Mengaktifkan META Robot</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Boost SEO</label>
                        <div class="col-10">
                            <?php if ($seopage[0]->status_boosting == 1) { ?>
                                <input type="checkbox" class="boost" checked value="1" name="status_boosting" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                            <?php } else { ?>
                                <input type="checkbox" class="boost" value="0" name="status_boosting" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                            <?php } ?>
                            <small class="form-text">*Mengaktifkan META Boosting Robot</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Judul Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="judul_page_seo" value="<?php echo $seopage[0]->judul_page_seo; ?>" placeholder="Inputkan Judul Toko Website"  required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Wonderful Morotai - Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morotai | Destinasi Wisata</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Keywords SEO Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" data-role="tagsinput" name="keywords" value="<?php echo $seopage[0]->keywords; ?>" placeholder="Inputkan Keywords" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Pulau Morotai, Wisata Morotai, Pulau Dodola, Morotai Island, Museum Perang Dunia, Kabupaten Morotai, Maluku Utara</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Copyright Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="copyright" value="<?php echo $seopage[0]->copyright; ?>" placeholder="Inputkan Copyright Website"  required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Copyright 2014 Wonderful Morotai - Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morotai</small>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">ID Twitter Toko</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="id_twitter" value="<?php echo $seopage[0]->id_twitter; ?>" placeholder="Inputkan ID Twitter Toko">
                            <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi  <b class="text-danger">Contoh :</b> @abangshop </small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">ID Facebook Page</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="id_fb_page" value="<?php echo $seopage[0]->id_fb_page; ?>" placeholder="Inputkan ID FB Page Toko">
                            <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> 379175886256657 (generate developer.facebook.com) </small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">ID Facebook App</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="id_fb_app" value="<?php echo $seopage[0]->id_fb_app; ?>" placeholder="Inputkan ID Twitter Toko">
                            <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> 566302074300395 (generate developer.facebook.com) </small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Canonical Website</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="canonical" value="<?php echo $seopage[0]->canonical; ?>" placeholder="Inputkan Canonical Webiste Toko" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b> diisi, <b class="text-danger">Contoh :</b> https://www.klamby.id/ </small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Deskripsi Website/Toko</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="5" name="deskripsi_page"><?php echo $seopage[0]->deskripsi_page; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Wonderful Pulau Morotai - Website Resmi Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morotai. Anda dapat melihat semua informasi tentang wisata dan budaya Pulau Morotai, Pulau Morotai, Wisata Morotai, Pulau Dodola, Morotai Island, Museum Perang Dunia, Kabupaten Morotai, Maluku Utara</small>  
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Gambar Website Meta (icon)</label>
                        <div class="col-10">
                            <?php if ($seopage[0]->gambar_page_seo == true) {
                                ?>
                                <input type="text" name="gambar_temp" value="<?php echo $seopage[0]->gambar_page_seo; ?>" style="display:none" />
                                <input type="file" id="input-file-now" name="gambar_page_seo" data-default-file="<?php echo base_url() . $seopage[0]->gambar_page_seo; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png ico" />
                            <?php } else { ?>          
                                <input type="text" name="gambar_temp" value="" style="display:none" />
                                <input type="file" id="input-file-now" name="gambar_page_seo" data-default-file="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png ico" />
                            <?php } ?>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, ico, dan berukuran dibawah 600kb (logo diutamakan resolusi 300*300 pixel)"</small>  
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
<div class="modal fade modal-tambahbanner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Banner Website</h4>
                <small>Silahkan Menambahkan Banner Toko Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('pengaturan/generalpage/post_banner'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Judul Banner</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="judul_banner" placeholder="Inputkan Judul Banner" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "A great selection of superb brands "</small>  
                        </div>
                    </div>
                    <div class="form-group row">          
                        <label class="col-2 col-form-label">Pasang? *</label>
                        <div class="col-10">
                            <input type="checkbox" class="baner" name="status_banner" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                            <small class="form-text">*Menampilkan di halaman utama</small> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Judul Promo</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="judul_promo" placeholder="Inputkan Judul Promo" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "50% off"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Konten Promo</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="konten" placeholder="Inputkan Konten Promo" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "on all clothes"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namakat" class="col-2 col-form-label">Highlight Banner</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="highlight" placeholder="Inputkan Highlight Banner" id="namakat" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "grab it fast"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Gambar Banner</label>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="gambar_banner" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" required/>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 2000*700 pixel)"</small>  
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
if (!empty($banner)) {
    foreach ($banner as $key => $value) {
        ?> 
        <div id="lihat_banner<?php echo $value->id_banner; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Banner Website</h4>
                        <small>Lihat Banner Website Toko</small>
                    </div>
                    <div class="modal-body">          
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="white-box pro-box p-0">
                                    <div class="pro-list-img banner-img-disp" style="background: url('<?php echo base_url() . $value->gambar_banner; ?>') center center / cover no-repeat;"> <span class="pro-label-img"></span> </div>
                                    <div class="pro-content-3-col">
                                        <div class="pro-list-details">
                                            <h4>
                                                <a class="text-danger" ><?php echo $value->judul_banner; ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr class="m-0"> <span class="label pro-col-label label-white text-dark">Deskripsi Banner</span>
                                    <br>
                                    <div class="row text-center">
                                        <div class="col-md-4 col-xs-4 b-r"> <strong>Judul Promo</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $value->judul_promo; ?></p>
                                        </div>   
                                        <div class="col-md-4 col-xs-4 b-r"> <strong>Konten Bnner</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $value->konten; ?></p>
                                        </div>
                                        <div class="col-md-4 col-xs-4 b-r"> <strong>Highlight</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $value->highlight; ?></p>
                                        </div>                        
                                    </div>
                                    <hr class="m-0">                                   
                                    <div class="clearfix"></div>
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
if (!empty($banner)) {
    foreach ($banner as $key => $value) {
        ?>       
        <div id="edit_banner<?php echo $value->id_banner; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Banner Website</h4>
                        <small>Silahkan Mengedit Banner Toko Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('pengaturan/generalpage/update_banner/' . $value->id_banner); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Judul Banner</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $value->judul_banner; ?>" name="judul_banner" placeholder="Inputkan Judul Banner" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "A great selection of superb brands "</small>  
                                </div>
                            </div>
                            <div class="form-group row">          
                                <label class="col-2 col-form-label">Pasang? *</label>
                                <div class="col-10">
                                    <?php if ($value->status_banner == 1) { ?>
                                        <input type="checkbox" class="baner" checked name="status_banner" value="1" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                    <?php } else { ?>
                                        <input type="checkbox" class="baner" name="status_banner" value="0" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                    <?php } ?>
                                    <small class="form-text">*Menampilkan di halaman utama</small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Judul Promo</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="judul_promo" value="<?php echo $value->judul_promo; ?>" placeholder="Inputkan Judul Promo" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "50% off"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Konten Promo</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="konten" value="<?php echo $value->konten; ?>" placeholder="Inputkan Konten Promo" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "on all clothes"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namakat" class="col-2 col-form-label">Highlight Banner</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="highlight" value="<?php echo $value->highlight; ?>" placeholder="Inputkan Highlight Banner" id="namakat" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "grab it fast"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Gambar Banner</label>                                
                                <div class="col-10">
                                    <div class="input-group">
                                        <input type="text" name="gambar_temp" value="<?php echo $value->gambar_banner; ?>" style="display:none" />
                                        <input type="text" name="gambar_temp_thumb" value="<?php echo $value->gambar_banner_thumb; ?>" style="display:none" />
                                        <input type="file" id="input-file-now" name="gambar_banner" data-default-file="<?php echo base_url() . $value->gambar_banner_thumb; ?>" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpeg jpg png" />
                                    </div>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (gambar diutamakan resolusi 2000*700 pixel)"</small>  
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
    $(".boost").bootstrapSwitch();
    $(".robot").bootstrapSwitch();
    $(".baner").bootstrapSwitch();

    $(".boost").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.boost').attr('value', '1');
        } else {
            $('.boost').attr('value', '0');
        }
    });
    $(".robot").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.robot').attr('value', '1');
        } else {
            $('.robot').attr('value', '0');
        }
    });
    $(".baner").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.baner').attr('value', '1');
        } else {
            $('.baner').attr('value', '0');
        }

    });
</script>

<script>
    function act_delete_banner(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Banner (" + name + ")!",
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
                    url: "<?php echo site_url("pengaturan/generalpage/delete_banner") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Banner (" + name + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Banner (" + name + ") batal dihapus.", "error");
            }
        });
    }
</script>
