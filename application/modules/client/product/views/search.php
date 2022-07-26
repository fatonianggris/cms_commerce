<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="<?php echo site_url('home') ?>" class="icon icon-home"></a></li>
            <li><a href="#">Product</a></li>
            <li class="active">
                <?php
                if (isset($_GET['kat'])) {
                    echo ucwords($_GET['kat']);
                }
                ?>
            </li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
    <div class="container">
        <!-- two columns -->
        <div class="row">
            <!-- left column -->
            <aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
                <a href="#" class="slide-column-close visible-sm visible-xs"><span class="icon icon-chevron_left"></span>back</a>
                <!-- category block -->
                <div class="collapse-block open ">
                    <h4 class="collapse-block__title ">CATEGORY</h4>
                    <div class="collapse-block__content">
                        <ul class="expander-list">
                            <?php
                            if (!empty($kategori)) {
                                $act = '';
                                foreach ($kategori as $key => $val) {
                                    if (@$_GET['kat'] == strtolower($val->nama_kategori)) {
                                        $act = 'active';
                                        ?>
                                        <li class="<?php echo $act; ?>">
                                            <a href="<?php echo site_url('product/search_product?kat=' . strtolower($val->nama_kategori)) ?>"><?php echo strtoupper($val->nama_kategori); ?></a><span class="expander"></span>
                                            <ul>
                                                <?php
                                                if (!empty($sub_kategori)) {
                                                    $act2 = '';
                                                    foreach ($sub_kategori as $key => $values) {
                                                        if ($values->id_level == $val->id_kategori) {
                                                            ?>
                                                            <li class=""><a href="<?php echo site_url('product/search_product?kat=' . strtolower($values->nama_kategori)) ?>"><?php echo ucwords($values->nama_kategori); ?></a></li>                                                        
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>         
                                            </ul>
                                        </li>
                                        <?php
                                    } else {
                                        $act = '';
                                        ?>
                                        <li class="">
                                            <a href="<?php echo site_url('product/search_product?kat=' . strtolower($val->nama_kategori)) ?>"><?php echo strtoupper($val->nama_kategori); ?></a><span class="expander"></span>
                                            <ul>
                                                <?php
                                                if (!empty($sub_kategori)) {
                                                    foreach ($sub_kategori as $key => $values) {
                                                        if ($values->id_level == $val->id_kategori) {
                                                            ?>
                                                            <li class=""><a href="<?php echo site_url('product/search_product?kat=' . strtolower($values->nama_kategori)) ?>"><?php echo ucwords($values->nama_kategori); ?></a></li>                                                        
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>         
                                            </ul>
                                        </li>
                                        <?php
                                    }  //ngatur nomor urut
                                }
                            }
                            ?>   
                        </ul>
                    </div>
                </div>
                <!-- /category block --> 
                <!-- price slider block -->
                <div class="collapse-block open">
                    <h4 class="collapse-block__title">PRICE</h4>
                    <div class="collapse-block__content">
                        <div id="priceSlider" class="price-slider"></div>
                        <form action="<?php echo site_url('product/search_product'); ?>">
                            <div class="price-input">
                                <label>From:</label>
                                <input type="text" name="prc_min" id="priceMin" />
                            </div>
                            <?php if (isset($_GET['kat'])) { ?>
                                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>"  />
                            <?php }
                            ?>
                            <div class="price-input-divider">-</div>
                            <div class="price-input">
                                <label>To:</label>
                                <input type="text" name="prc_max" id="priceMax" />
                            </div>
                            <div class="price-input">
                                <button type="submit" class="btn btn--ys btn--md">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /price slider block --> 									
                <!-- featured block -->
                <div class="collapse-block open coll-products-js">
                    <h4 class="collapse-block__title">FEATURED</h4>
                    <div class="collapse-block__content coll-gallery">
                    </div>
                    <div class="coll-gallery-clone" style="display:none">
                        <div class="vertical-carousel vertical-carousel-2 offset-top-10">
                            <?php
                            if (!empty($produk_rekomendasi)) {
                                foreach ($produk_rekomendasi as $key => $value) {
                                    ?> 
                                    <div class="vertical-carousel__item">
                                        <div class="vertical-carousel__item__image pull-left">
                                            <?php
                                            if (!empty($gambar_produk)) {
                                                foreach ($gambar_produk as $key => $val) {
                                                    if ($val->token == $value->token) {
                                                        ?>
                                                        <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" width="90" height="100">
                                                        <?php
                                                        break;
                                                    }
                                                }  //ngatur nomor urut
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt=""> 
                                            <?php }
                                            ?>          
                                        </div>
                                        <div class="vertical-carousel__item__title">
                                            <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo ucwords(strtolower($value->nama_produk)); ?></a></h2>
                                        </div>
                                        <?php if ($value->status_promo == 1) {
                                            ?>                                            
                                            <div class="price-box">
                                                Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_promo), "xx", 1, 2); ?>
                                                <span class="price-box__old">Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), "xx", 1, 2); ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="price-box">
                                                Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), "xx", 1, 2); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>         
                        </div>
                    </div>
                </div>
                <!-- /featured block -->
                <!--                 tags block 
                                <div class="collapse-block">
                                    <h4 class="collapse-block__title">POPULAR TAGS</h4>
                                    <div class="collapse-block__content">
                                        <ul class="tags-list">
                                            <li><a href="#">Grey</a></li>
                                            <li><a href="#">Shirt</a></li>
                                            <li><a href="#">suit</a></li>
                                            <li><a href="#">Dresses </a></li>
                                            <li><a href="#">Outerwear</a></li>
                                        </ul>
                                    </div>
                                </div>
                                 /tags block  -->
            </aside>
            <!-- /left column --> 
            <!-- center column -->
            <aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
                <!-- title -->
                <div class="title-box">
                    <h2 class="text-center text-uppercase title-under">
                        <?php
                        if (isset($_GET['kat'])) {
                            echo strtoupper($_GET['kat']);
                        } else {
                            ?>
                            Search Result
                        <?php }
                        ?>
                    </h2>
                    <small><b>
                            Search for:
                            <?php
                            if (isset($_GET['name'])) {
                                echo strtoupper($_GET['name']);
                            }
                            ?></b>
                    </small>
                </div>
                <!-- /title -->					
                <!-- filters row -->
                <div class="filters-row border-top-none">
                    <div class="pull-left">
                        <div class="filters-row__mode">
                            <a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a> 
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
                        </div>

                    </div>
                    <div class="pull-right">                       
                        <div class="filters-row__pagination">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>                              
                                <li><a href="#"><span class="icon icon-chevron_right"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /filters row -->
                <div class="product-listing row">
                    <?php
                    if (!empty($produk_search)) {
                        foreach ($produk_search as $key => $value) {
                            ?> 
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
                                <!-- product -->
                                <?php if ($value->stok_barang == 0) { ?>
                                    <div class="product sold-out">
                                    <?php } else { ?>
                                        <div class="product">
                                        <?php } ?>
                                        <div class="product__inside">
                                            <!-- product image -->
                                            <div class="product__inside__image">
                                                <!-- product image carousel -->
                                                <div class="product__inside__carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        <?php
                                                        if (!empty($gambar_produk)) {
                                                            $i = 0;
                                                            foreach ($gambar_produk as $key => $val) {
                                                                if ($val->token == $value->token) {
                                                                    if ($i == 0) {
                                                                        ?>
                                                                        <div class="item active"><img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" width="270" height="335"> </div>
                                                                    <?php } else {
                                                                        ?>
                                                                        <div class="item"><img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" width="270" height="335"> </div>
                                                                        <?php
                                                                    }
                                                                    $i++;
                                                                }
                                                            }  //ngatur nomor urut
                                                            $i = 0;
                                                        } else {
                                                            ?>
                                                            <div class="item active"><img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt=""> </div>
                                                        <?php }
                                                        ?>          
                                                    </div>
                                                    <!-- Controls --> 
                                                    <a class="carousel-control next"></a> <a class="carousel-control prev"></a> 

                                                    <?php if ($value->stok_barang == 0) { ?>
                                                        <div class="product__label--sold-out"> <span>SOLD<br>
                                                                OUT</span> 
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                                <!-- /product image carousel -->                                                 
                                                <!-- quick-view --> 
                                                <a href="#" data-toggle="modal" data-target=".produk_search<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> See product</b> </a> 
                                                <!-- /quick-view --> 

                                            </div>
                                            <!-- /product image --> 
                                            <!-- label news -->
                                            <div class="product__label product__label--right product__label--new"> <span>Recomended</span> </div>
                                            <!-- /label news --> 
                                            <?php
                                            $words = explode(" ", $value->spesifikasi_barang);
                                            $limit_word = implode(" ", array_splice($words, 0, 200));
                                            ?>
                                            <div class="product__inside__description row-mode-visible"> 
                                                <?php echo $limit_word ?>
                                            </div>
                                            <!-- label sale -->
                                            <?php if ($value->status_promo == 1) { ?>
                                                <div class="product__label product__label--left product__label--sale"> 
                                                    <span>discount<br>
                                                        -<?php echo $value->potongan_harga; ?>%</span> 
                                                </div>
                                            <?php } ?>
                                            <!-- /label sale --> 
                                            <?php
                                            $words_name = explode(" ", $value->nama_produk);
                                            $limit_word_name = implode(" ", array_splice($words_name, 0, 4));
                                            ?>
                                            <!-- product name -->
                                            <div class="product__inside__name">
                                                <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo $limit_word_name; ?></a></h2>
                                            </div>
                                            <!-- /product name -->                                                
                                            <!-- product price -->
                                            <?php
                                            if ($value->status_promo == 1) {
                                                if ($value->status_sensor_harga == 1) {
                                                    ?>
                                                    <div class="product__inside__price price-box">Rp<?php echo substr_replace($value->harga_promo, str_repeat("x", $value->end_digit - $value->start_digit + 1), $value->start_digit - 1, $value->end_digit - $value->start_digit + 1); ?>
                                                        <span class="price-box__old">Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), str_repeat("x", $value->end_digit - $value->start_digit + 1), $value->start_digit - 1, $value->end_digit - $value->start_digit + 1); ?></span>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="product__inside__price price-box">Rp<?php echo $value->harga_promo; ?>
                                                        <span class="price-box__old">Rp<?php echo preg_replace("/[,.\s+]/", "", $value->harga_barang); ?></span>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                if ($value->status_sensor_harga == 1) {
                                                    ?>
                                                    <div class="product__inside__price price-box">
                                                        Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), str_repeat("x", ($value->end_digit - $value->start_digit) + 1), $value->start_digit - 1, ($value->end_digit - $value->start_digit) + 1); ?>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="product__inside__price price-box">
                                                        Rp<?php echo preg_replace("/[,.\s+]/", "", $value->harga_barang); ?>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <!--/product price -->
                                            <div class = "product__inside__hover">
                                                <!--product info -->
                                                <div class = "product__inside__info">
                                                    <div class = "product__inside__info__btns"> 
                                                        <a href = "<?php echo site_url('product/detail_product/' . $value->id_produk) ?>" class = "btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class = "icon icon-visibility"></span> See product</a>
                                                    </div>
                                                </div>
                                                <!--/product info -->
                                                <ul class="product__inside__info__link hidden-xs">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/product -->
                                </div>
                                <?php
                            }  //ngatur nomor urut
                        } else {
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
                                <!-- title -->
                                <div class="title-box">
                                    <h1 class="text-center text-uppercase title-under">Sorry, product not found :(</h1>
                                </div>
                                <!-- /title -->		
                                <div class="text-center"> 
                                    <br>
                                    <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/empty-search-icon.png" alt="empty search icon" class="img-responsive-inline" />
                                    <div class="divider divider--lg"></div>
                                    <h4 class="color">Your search returns no results.</h4>		          
                                </div>					
                            </div>
                        <?php }
                        ?> 
                        <!-- /product --> 
                    </div>
                </div>
                <!-- filters row -->
                <div class="filters-row border-top-none">
                    <div class="pull-left">
                        <div class="filters-row__mode">
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
                        </div>

                    </div>
                    <div class="pull-right">
                        <div class="filters-row__pagination">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>                               
                                <li><a href="#"><span class="icon icon-chevron_right"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /filters row --> 
            </aside>
            <!-- center column --> 
            <div class="hor-line"></div> 
        </div>
        <!-- /two columns --> 
    </div>
</div>
<!-- End CONTENT section --> 
<?php
if (!empty($produk_search)) {
    foreach ($produk_search as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_search<?php echo $value->id_produk; ?>"  id="quickViewModal">
            <div class="modal-dialog white-modal">
                <div class="modal-content container">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>
                    <!--  -->
                    <div class="product-popup">
                        <div class="product-popup-content">
                            <div class="container-fluid">
                                <div class="row product-info-outer">
                                    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                        <div class="product-main-image">
                                            <div class="product-main-image__item">
                                                <?php
                                                if (!empty($gambar_produk)) {
                                                    $i = 0;
                                                    foreach ($gambar_produk as $key => $val) {
                                                        if ($val->token == $value->token) {
                                                            if ($i == 0) {
                                                                ?>
                                                                <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" > 
                                                                <?php
                                                                break;
                                                            } else {
                                                                ?>
                                                                <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="">
                                                                <?php
                                                            }
                                                        }
                                                    }  //ngatur nomor urut
                                                } else {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt=""> 
                                                <?php }
                                                ?>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
                                        <div class="wrapper">
                                            <div class="product-info__sku pull-left text-red">SKU: <strong><?php echo $value->sku_produk; ?></strong></div>
                                            <div class="product-info__availabilitu pull-right">STOCK: <strong class="color"><?php echo $value->stok_barang; ?> item</strong></div>
                                        </div>
                                        <div class="product-info__title">
                                            <h2><strong><?php echo $value->nama_produk; ?></strong></h2>
                                        </div>
                                        <div class="price-box product-info__price"> 
                                            <!-- product price -->
                                            <?php
                                            if ($value->status_promo == 1) {
                                                if ($value->status_sensor_harga == 1) {
                                                    ?>
                                                    <span class="mark bg-red color-white">-<?php echo $value->potongan_harga; ?>%</span>
                                                    <span class="price-box__new">Rp<?php echo substr_replace($value->harga_promo, str_repeat("x", $value->end_digit - $value->start_digit + 1), $value->start_digit - 1, $value->end_digit - $value->start_digit + 1); ?></span>
                                                    <span class="price-box__old">Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), str_repeat("x", $value->end_digit - $value->start_digit + 1), $value->start_digit - 1, $value->end_digit - $value->start_digit + 1); ?></span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="mark bg-red color-white">-<?php echo $value->potongan_harga; ?>%</span>
                                                    <span class="price-box__new">Rp<?php echo $value->harga_promo; ?></span>
                                                    <span class="price-box__old">Rp<?php echo preg_replace("/[,.\s+]/", "", $value->harga_barang); ?></span>
                                                    <?php
                                                }
                                            } else {
                                                if ($value->status_sensor_harga == 1) {
                                                    ?>
                                                    <span class="price-box__new">
                                                        Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $value->harga_barang), str_repeat("x", ($value->end_digit - $value->start_digit) + 1), $value->start_digit - 1, ($value->end_digit - $value->start_digit) + 1); ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="price-box__new">
                                                        Rp<?php echo preg_replace("/[,.\s+]/", "", $value->harga_barang); ?>
                                                    </span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <!--/product price -->
                                        </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <?php
                                        $words = explode(" ", $value->spesifikasi_barang);
                                        $limit_word = implode(" ", array_splice($words, 0, 200));
                                        ?>
                                        <div class="product-info__description">
                                            <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                                                                 ?>" alt="" width="100"> </div>-->
                                            <div class="product-info__description__text"><?php echo $limit_word; ?></div>
                                            <ul class="product-link pull-right">                                                   
                                                <li class="text-left">*<span class="icon icon-sort tooltip-link"></span><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><span class="text">see details</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <?php if ($value->warna_barang == 0 or $value->warna_barang == '' or $value->warna_barang == NULL) { ?>

                                        <?php } else { ?>
                                            <div class="wrapper">
                                                <div class="pull-left"><span class="option-label"><strong>COLOR:</strong></span><span class="required">*</span></div>
                                                <div class="pull-right required"><b>*required</b></div>
                                            </div>
                                            <?php
                                            $id_warna = $value->warna_barang;
                                            $id_array_warna = explode(',', $id_warna);
                                            if (!empty($warna)) {
                                                foreach ($warna as $key => $val) {
                                                    if (in_array($val->id_warna, $id_array_warna)) {
                                                        ?>
                                                        <div class="form-group clearfix fill-bg radio-fill-inner-sx col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                            <label class="radio">
                                                                <input id="warna<?php echo $val->id_warna; ?>" type="radio" value="<?php echo $val->id_warna; ?>" name="warna_barang">
                                                                <span class="outer">
                                                                    <span class="inner"></span>
                                                                </span>
                                                                <b><?php echo strtoupper($val->nama_warna); ?></b>
                                                            </label>
                                                        </div> 
                                                        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>      
                                        <?php } ?>
                                        <div class="divider divider--sm"></div>

                                        <?php if ($value->ukuran_barang == 0 or $value->ukuran_barang == '' or $value->ukuran_barang == NULL) { ?>

                                        <?php } else { ?>
                                            <div class="wrapper">
                                                <div class="pull-left"><span class="option-label"><strong>SIZE:</strong></span></div>
                                                <div class="pull-left required">*</div>
                                            </div>
                                            <?php
                                            $id_ukuran = $value->ukuran_barang;
                                            $id_array_ukuran = explode(',', $id_ukuran);
                                            if (!empty($size)) {
                                                foreach ($size as $key => $val) {
                                                    if (in_array($val->id_size, $id_array_ukuran)) {
                                                        ?>                                                       
                                                        <div class="form-group clearfix fill-bg radio-fill-inner-sx col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                            <label class="radio">
                                                                <input id="size<?php echo $val->id_size; ?>" type="radio" value="<?php echo $val->id_size; ?>" name="ukuran_barang">
                                                                <span class="outer">
                                                                    <span class="inner"></span>
                                                                </span>
                                                                <b><?php echo strtoupper($val->nama_size); ?></b>
                                                            </label>
                                                        </div> 
                                                        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                        <div class="divider divider--sm"></div>
                                        <div class="wrapper">
                                            <div class="pull-left"><span class="qty-label"><strong>QTY:</strong></span></div>
                                            <div class="pull-left"><input type="number" min="1" name="jumlah_barang" class="input--ys qty-input pull-left" value="1"></div>
                                            <div class="pull-left"><a href = "https://api.whatsapp.com/send?phone=62<?php echo substr($general_page[0]->contact_bussines, 1); ?>&text=<?php echo site_url('product/detail_product/' . $value->id_produk) . urlencode("\n") ?> Apakah produk ini masih ada?" target="_blank" type="submit" class="btn btn--ys btn--xxl"><span class="icon icon-call"></span> Whatsapp</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                </div>
            </div>
        </div>
        <!-- / Modal (quickViewModal) -->
        <?php
    }  //ngatur nomor urut
}
?>   
