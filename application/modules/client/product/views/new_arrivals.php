<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="<?php echo site_url('home') ?>" class="icon icon-home"></a></li>
            <li><a href="#">Product</a></li>
            <li class="active">New Arrival's</li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
    <div class="container">
        <!-- two columns -->
        <div class="row">          
            <!-- center column -->
            <aside class="col-md-12 col-lg-12 col-xl-12" id="centerColumn">
                <!-- title -->
                <div class="title-box">
                    <h2 class="text-center text-uppercase title-under">NEW ARRIVAL’S</h2>
                </div>
                <!-- /title -->												
                <!-- filters row -->
                <div class="filters-row filters-row-layout border-top-none">							
                    <div class="pull-left col-xs-12 col-sm-12 col-md-5">
                        <div class="filters-row__mode">									
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
                        </div>                      
                    </div>                  
                    <div class="pull-right col-xs-12 col-sm-12 col-md-5 text-right">                       
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
                    if (!empty($produk_arrival)) {
                        foreach ($produk_arrival as $key => $value) {
                            ?> 
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 col-xl-2">
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
                                                <a href="#" data-toggle="modal" data-target=".produk_arrival<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> See Product</b> </a> 
                                                <!-- /quick-view -->                                                
                                            </div>
                                            <!-- /product image --> 
                                            <!-- label news -->
                                            <div class="product__label product__label--right product__label--new"> <span>New Arrivals</span> </div>
                                            <!-- /label news --> 
                                            <!-- label sale -->
                                            <?php if ($value->status_promo == 1) { ?>
                                                <div class="product__label product__label--left product__label--sale"> 
                                                    <span>Discount<br>
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
                                            <?php
                                            $words = explode(" ", $value->spesifikasi_barang);
                                            $limit_word = implode(" ", array_splice($words, 0, 200));
                                            ?>
                                            <div class="product__inside__description row-mode-visible"> 
                                                <?php echo $limit_word ?>
                                            </div>
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
                                                        <a href = "<?php echo site_url('product/detail_product/' . $value->id_produk) ?>" class = "btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class = "icon icon-visibility"></span> See product</a></div>
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
                            <?php if (empty($produk_promo)) { ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">			

                                    <div class="text-center"> 
                                        <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/empty-cart-icon.png" alt="empty cart icon" class="img-responsive-inline" />
                                        <div class="divider divider--lg"></div>
                                        <h4 class="color">You have no now arrival product in your shop.</h4>

                                    </div>					
                                </div>
                            <?php }
                            ?>       
                        <?php }
                        ?>  
                        <!-- /product --> 
                    </div>
                </div>
                <!-- filters row -->
                <div class="filters-row filters-row-layout border-top-none">							
                    <div class="pull-left col-xs-12 col-sm-12 col-md-5">
                        <div class="filters-row__mode">									
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
                        </div>

                    </div>

                    <div class="pull-right col-xs-12 col-sm-12 col-md-5 text-right">                        
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
if (!empty($produk_arrival)) {
    foreach ($produk_arrival as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_arrival<?php echo $value->id_produk; ?>"  id="quickViewModal">
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
                                            <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                 ?>" alt="" width="100"> </div>-->
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
