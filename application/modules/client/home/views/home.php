<!-- Slider section --> 

<div class="container">
    <div class="row">
        <div class="offset-top-0" id="slider">
            <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
            <h2 class="hidden">Slider Section</h2>
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <!-- SLIDE -1 -->
                        <?php
                        if (!empty($banner)) {
                            foreach ($banner as $key => $value) {
                                ?> 
                                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                                    <!-- MAIN IMAGE --> 
                                    <img src="<?php echo base_url() . $value->gambar_banner; ?>"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
                                    <!-- LAYERS --> 
                                    <!-- TEXT -->
                                    <div class="tp-caption lfl stb" 
                                         data-x="205"              
                                         data-y="center"    
                                         data-voffset="60" 
                                         data-speed="600" 
                                         data-start="900" 
                                         data-easing="Power4.easeOut" 
                                         data-endeasing="Power4.easeIn" 
                                         style="z-index: 2;">
                                        <div class="tp-caption1--wd-1"><?php echo $value->judul_banner; ?></div>
                                        <div class="tp-caption1--wd-2"><?php echo $value->judul_promo; ?></div>
                                        <div class="tp-caption1--wd-3"><?php echo $value->konten; ?></div>
                                        <a href="<?php echo site_url('product/new_arrivals') ?>" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
                                    </div>
                                </li>
                                <!-- /SLIDE -1 -->
                                <?php
                            }  //ngatur nomor urut
                        }
                        ?>                      						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END REVOLUTION SLIDER --> 
<!-- CONTENT section -->
<div id="pageContent">
    <!-- category section -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="category-carousel">
                    <?php
                    if (!empty($kategori)) {
                        foreach ($kategori as $key => $value) {
                            ?> 
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <a href="<?php echo site_url('product/search_product?kat=' . strtolower($value->nama_kategori)) ?>" class="banner zoom-in">
                                    <span class="figure">
                                        <img class="img-cat" src="<?php echo base_url() . $value->gambar_kategori; ?>" alt="" />
                                        <span class="figcaption">
                                            <span class="block-table">
                                                <span class="block-table-cell">
                                                    <span class="banner__title size5"><?php echo $value->nama_kategori; ?></span>
                                                    <span class="btn btn--ys btn--xl">Shop now!</span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>    
                            <?php
                        }  //ngatur nomor urut
                    }
                    ?>          
                </div>
            </div>
        </div>
    </div>
    <!-- /category section -->
    <!-- featured products -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-center text-uppercase title-under">FEATURE PRODUCT</h2>
                    </div>
                    <!-- /title -->
                    <div class="carousel-products row" id="carouselFeatured">
                        <?php
                        if (!empty($produk_rekomendasi)) {
                            foreach ($produk_rekomendasi as $key => $value) {
                                ?> 
                                <div class="col-xs- col-sm-4 col-md-3 col-lg-3 col-xl-3">
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
                                                    <a href="#" data-toggle="modal" data-target=".produk_rekomendasi<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> See product</b> </a> 
                                                    <!-- /quick-view --> 
                                                </div>
                                                <!-- /product image --> 
                                                <!-- label news -->
                                                <div class="product__label product__label--right product__label--new"> <span>recomeded</span> </div>
                                                <!-- /label news --> 
                                                <!-- label sale -->
                                                <?php if ($value->status_promo == 1) { ?>
                                                    <div class="product__label product__label--left product__label--sale"> 
                                                        <span>discount<br>
                                                            -<?php echo $value->potongan_harga; ?>%</span> 
                                                    </div>
                                                <?php } ?>
                                                <!-- /label sale --> 
                                                <?php
                                                $words = explode(" ", $value->nama_produk);
                                                $limit_word = implode(" ", array_splice($words, 0, 4));
                                                ?>
                                                <!-- product name -->
                                                <div class="product__inside__name">
                                                    <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo $limit_word; ?></a></h2>
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
                                                            <a href = "#" class = "btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class = "icon icon-visibility"></span> See product</a> 
                                                        </div>
                                                    </div>
                                                    <ul class="product__inside__info__link hidden-xs">
                                                    </ul>
                                                    <!--/product info -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--/product -->
                                    </div>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>                            
                        </div>
                    </div>
                    <?php if (empty($produk_rekomendasi)) { ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">			

                            <div class="text-center"> 
                                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/empty-cart-icon.png" alt="empty cart icon" class="img-responsive-inline" />
                                <div class="divider divider--lg"></div>
                                <h4 class="color">You have no product in your shop.</h4>

                            </div>					
                        </div>
                    <?php }
                    ?>       
                </div>
                <div class="hor-line"></div>  
            </div>
        </div>
        <!-- news & sale products -->
        <div class="content-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xl-6">
                        <!-- title -->
                        <div class="title-with-button ">
                            <div class="carousel-products__button pull-right"> 
                                <span class="btn-prev"></span> <span class="btn-next"></span> 
                            </div>
                            <h2 class="text-left text-uppercase title-under pull-left">new product</h2>
                        </div>
                        <!-- /title --> 
                        <!-- carousel -->
                        <div class="carousel-products row" id="carouselNew">
                            <?php
                            if (!empty($produk_baru)) {
                                foreach ($produk_baru as $key => $value) {
                                    ?> 
                                    <div class="col-lg-3">
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product__inside">
                                                <!-- product image -->
                                                <div class="product__inside__image img-hover-zoom">
                                                    <?php
                                                    if (!empty($gambar_produk)) {
                                                        $k = 0;
                                                        foreach ($gambar_produk as $key => $val) {
                                                            if ($val->token == $value->token) {
                                                                if ($k == 0) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" width="270" height="335" >

                                                                    <?php
                                                                    break;
                                                                }
                                                                ?>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }  //ngatur nomor urut
                                                        $k = 0;
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt="">
                                                    <?php }
                                                    ?>          
                                                    <!-- quick-view --> 
                                                    <a href="#" data-toggle="modal" data-target=".produk_baru<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> see product</b> </a> 
                                                    <!-- /quick-view --> 
                                                </div>
                                                <!-- /product image --> 
                                                <!-- label news -->
                                                <div class="product__label product__label--right product__label--new"> <span>NEW</span> </div>
                                                <!-- /label news --> 
                                                <?php
                                                $words = explode(" ", $value->nama_produk);
                                                $limit_word = implode(" ", array_splice($words, 0, 4));
                                                ?>
                                                <!-- product name -->
                                                <div class="product__inside__name">
                                                    <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo $limit_word; ?></a></h2>
                                                </div>
                                                <!-- /product name --> 
                                                <!-- product price -->
                                                <?php if ($value->status_sensor_harga == 1) {
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
                                                <?php }
                                                ?>
                                                <!-- /product price --> 

                                                <div class="product__inside__hover">
                                                    <!-- product info -->
                                                    <div class="product__inside__info">
                                                        <div class="product__inside__info__btns"> 
                                                            <a href="#" class="btn btn--ys btn--xl row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> See product</a> 
                                                        </div>
                                                        <ul class="product__inside__info__link hidden-xs">
                                                        </ul>
                                                    </div>
                                                    <!-- /product info -->                                            
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product --> 
                                    </div>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </div>
                        <!-- /carousel --> 
                        <?php if (empty($produk_baru)) { ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">			

                                <div class="text-center"> 
                                    <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/empty-cart-icon.png" alt="empty cart icon" class="img-responsive-inline" />
                                    <div class="divider divider--lg"></div>
                                    <h4 class="color">You have no new product in your shop.</h4>

                                </div>					
                            </div>
                        <?php }
                        ?>       
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-6">
                        <div class="divider--lg visible-sm visible-xs"></div>
                        <!-- title -->
                        <div class="title-with-button">
                            <div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                            <h2 class="text-left text-uppercase title-under pull-left">sale product</h2>
                        </div>
                        <!-- /title --> 
                        <!-- carousel -->
                        <div class="carousel-products row" id="carouselSale">
                            <?php
                            if (!empty($produk_promo)) {
                                foreach ($produk_promo as $key => $value) {
                                    ?> 
                                    <div class="col-lg-4">
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product__inside">
                                                <!-- product image -->
                                                <div class="product__inside__image img-hover-zoom">
                                                    <?php
                                                    if (!empty($gambar_produk)) {
                                                        $l = 0;
                                                        foreach ($gambar_produk as $key => $val) {
                                                            if ($val->token == $value->token) {
                                                                if ($l == 0) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" width="270" height="335">
                                                                    <?php
                                                                    break;
                                                                }
                                                                ?>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }  //ngatur nomor urut
                                                        $l = 0;
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt="">
                                                    <?php }
                                                    ?>          <!-- quick-view --> 
                                                    <a href="#" data-toggle="modal" data-target=".produk_promo<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> See product</b> </a> 
                                                    <!-- /quick-view --> 
                                                </div>
                                                <!-- /product image --> 
                                                <!-- label sale -->
                                                <div class="product__label product__label--left product__label--sale"> 
                                                    <span>discount<br>
                                                        -<?php echo $value->potongan_harga; ?>%</span> 
                                                </div>
                                                <!-- /label sale --> 
                                                <?php
                                                $words = explode(" ", $value->nama_produk);
                                                $limit_word = implode(" ", array_splice($words, 0, 4));
                                                ?>
                                                <!-- product name -->
                                                <div class="product__inside__name">
                                                    <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo $limit_word ?></a></h2>
                                                </div>
                                                <!-- /product name --> 
                                                <!-- product price -->
                                                <?php if ($value->status_sensor_harga == 1) {
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
                                                <?php }
                                                ?>
                                                <!-- /product price --> 
                                                <div class="product__inside__hover">
                                                    <!-- product info -->
                                                    <div class="product__inside__info">
                                                        <div class="product__inside__info__btns"> 
                                                            <a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> See product</a> 
                                                        </div>
                                                        <ul class="product__inside__info__link hidden-xs">
                                                        </ul>
                                                    </div>
                                                    <!-- /product info --> 

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product --> 
                                    </div>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>         
                        </div>
                        <!-- /carousel --> 
                        <?php if (empty($produk_promo)) { ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">			

                                <div class="text-center"> 
                                    <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/empty-cart-icon.png" alt="empty cart icon" class="img-responsive-inline" />
                                    <div class="divider divider--lg"></div>
                                    <h4 class="color">You have no sale product in your shop.</h4>

                                </div>					
                            </div>
                        <?php }
                        ?>       
                    </div>
                </div>
                <div class="hor-line"></div>  
            </div>
        </div>  
    </div>
</div>

<!-- End CONTENT section -->

<!-- /modalAddToCart -->   
<?php
if (!empty($produk_rekomendasi)) {
    foreach ($produk_rekomendasi as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_rekomendasi<?php echo $value->id_produk; ?>"  id="quickViewModal">
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
                                        <div class="product-info__description">
                                            <?php
                                            $words = explode(" ", $value->spesifikasi_barang);
                                            $limit_word = implode(" ", array_splice($words, 0, 200));
                                            ?>
                                            <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                                                                                                             ?>" alt="" width="100"> </div>-->
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
<?php
if (!empty($produk_baru)) {
    foreach ($produk_baru as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_baru<?php echo $value->id_produk; ?>"  id="quickViewModal">
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
                                        </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <div class="product-info__description">
                                            <?php
                                            $words = explode(" ", $value->spesifikasi_barang);
                                            $limit_word = implode(" ", array_splice($words, 0, 200));
                                            ?>
                                             <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                                                                                                             ?>" alt="" width="100"> </div>-->
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
<?php
if (!empty($produk_promo)) {
    foreach ($produk_promo as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_promo<?php echo $value->id_produk; ?>"  id="quickViewModal">
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
                                        </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <div class="product-info__description">
                                            <?php
                                            $words = explode(" ", $value->spesifikasi_barang);
                                            $limit_word = implode(" ", array_splice($words, 0, 200));
                                            ?>
                                            <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                                                                                                            ?>" alt="" width="100"> </div>-->
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
<!--================== /modal ==================-->
<!-- Modal (newsletter) -->		
<div class="modal modal--bg fade" id="newsletterModal" data-pause=2000>
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h2 class="text-uppercase modal-title">JOIN US & GET IT NOW!</h2>
                    <p class="color custom-font">All Products Are Original and Handmade by Local Craftsman</p>
                    <form id="newsletter_form" enctype="application/x-www-form-urlencoded" method="post" class="subscribe-form">
                        <div class="row-subscibe">			           				            		 
                            <input type="email" name="email_user" placeholder="Your E-mail">
                            <button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
                        </div>                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal (newsletter) -->		
<div class="modal modal--bg fade" id="success_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title">THANK YOU FOR FOLLOWING OUR PRODUCT :)</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--bg fade" id="error_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title color-red">oops.. something went wrong :(</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--bg fade" id="error_net_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title color-red">please check your network connection !!</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/bootstrap/bootstrap.min.js"></script> 
<script>
    jQuery(function ($j) {

        "use strict";
        if ($j('#newsletterModal').length) {
            var pause = $j('#newsletterModal').attr('data-pause');
            setTimeout(function () {
                $j('#newsletterModal').modal('show');
            }, pause);
        }

    })

    $(function () {
        $('#newsletter_form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('home/add_newsletter'); ?>',
                data: $('#newsletter_form').serialize(),
                success: function (result) {
                    if (result == 1) {
                        $("#newsletterModal").modal("toggle");
                        $("#success_modal").modal('show');
                    } else {
                        $("#error_modal").modal('show');
                    }
                },
                error: function (result) {
                    $("#error_net_modal").modal('show');
                }
            });

        });

    });
</script>