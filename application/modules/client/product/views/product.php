<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="<?php echo site_url('home') ?>" class="icon icon-home"></a></li>
            <li><a href="<?php echo site_url('product/search_product?kat=' . strtolower($detail_produk[0]->nama_kategori)) ?>"><?php echo strtoupper($detail_produk[0]->nama_kategori); ?></a></li>
            <li class="active"><?php echo strtoupper($detail_produk[0]->nama_produk); ?></li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
    <section class="content offset-top-0">
        <div class="container">
            <div class="row product-info-outer">
                <div id="productPrevNext" class="hidden-xs hidden-sm">
                    <?php
                    $prev = $detail_produk[0]->id_produk - 1;
                    $next = $detail_produk[0]->id_produk + 1;
                    ?>
                    <a href="<?php echo site_url('product/detail_product/' . $prev) ?>" class="product-prev"></a>
                    <a href="<?php echo site_url('product/detail_product/' . $next) ?>" class="product-next"></a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 hidden-xs">
                            <div class="product-main-image">
                                <div class="product-main-image__item">
                                    <?php
                                    if (!empty($gambar_produk)) {
                                        $k = 0;
                                        foreach ($gambar_produk as $key => $val) {
                                            if ($val->token == $detail_produk[0]->token) {

                                                if ($k == 0) {
                                                    ?>                                                   
                                                    <img class="product-zoom" src='<?php echo base_url() . $val->gambar_produk_thumb; ?>' data-zoom-image="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" />
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
                                        <img class="product-zoom" src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt="">
                                    <?php }
                                    ?>          
                                </div>
                                <div class="product-main-image__zoom"></div>
                            </div>
                            <div class="product-images-carousel">
                                <ul id="smallGallery">
                                    <?php
                                    if (!empty($gambar_produk)) {
                                        $i = 0;
                                        foreach ($gambar_produk as $key => $val) {
                                            if ($val->token == $detail_produk[0]->token) {
                                                ?>
                                                <li><a href="#" data-image="<?php echo base_url() . $val->gambar_produk; ?>" data-zoom-image="<?php echo base_url() . $val->gambar_produk; ?>"><img src="<?php echo base_url() . $val->gambar_produk; ?>" alt="" /></a></li>
                                                <?php
                                            }
                                        }  //ngatur nomor uru                               
                                    } else {
                                        ?>
                                        <li><a href="#" data-image="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" data-zoom-image="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg"><img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt="" /></a></li>
                                    <?php }
                                    ?>          
                                </ul>
                            </div>
                        </div>
                        <div class="product-info col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="wrapper hidden-xs">
                                <div class="product-info__sku pull-left color-dark"><strong>SKU:</strong>  <strong class="text-color"><?php echo $detail_produk[0]->sku_produk; ?></strong></div>
                                <div class="product-info__availability pull-right color-dark">
                                    <strong>STOCK:</strong>  
                                    <?php if ($detail_produk[0]->stok_barang >= 0) { ?>
                                        <strong class="color"><?php echo $detail_produk[0]->stok_barang; ?> ITEM</strong>
                                    <?php } else { ?> 
                                        <strong class="color-red">SOLD</strong>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="product-info__title">
                                <h2><?php echo strtoupper($detail_produk[0]->nama_produk); ?></h2>
                            </div>
                            <div class="wrapper visible-xs">
                                <div class="product-info__sku pull-left"><strong>SKU:</strong>  <strong><?php echo $detail_produk[0]->sku_produk; ?></strong> </div>
                                <div class="product-info__availability pull-right">
                                    <strong>STOK:</strong>   
                                    <?php if ($detail_produk[0]->stok_barang >= 0) { ?>
                                        <strong class="color"><?php echo $detail_produk[0]->stok_barang; ?> ITEM</strong>
                                    <?php } else { ?> 
                                        <strong class="color-red">SOLD</strong>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="visible-xs">
                                <div class="clearfix"></div>
                                <ul id="mobileGallery">
                                    <?php
                                    if (!empty($gambar_produk)) {
                                        $i = 0;
                                        foreach ($gambar_produk as $key => $val) {
                                            if ($val->token == $detail_produk[0]->token) {
                                                ?>
                                                <li><a href="#" data-image="<?php echo base_url() . $val->gambar_produk; ?>" data-zoom-image="<?php echo base_url() . $val->gambar_produk; ?>"><img src="<?php echo base_url() . $val->gambar_produk; ?>" alt="" /></a></li>
                                                <?php
                                            }
                                        }  //ngatur nomor uru                               
                                    } else {
                                        ?>
                                        <li><a href="#" data-image="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" data-zoom-image="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg"><img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt="" /></a></li>
                                    <?php }
                                    ?>      
                                </ul>
                            </div>
                            <div class="price-box product-info__price"> 
                                <!-- product price -->
                                <?php
                                if ($detail_produk[0]->status_promo == 1) {
                                    if ($detail_produk[0]->status_sensor_harga == 1) {
                                        ?>
                                        <span class="mark bg-red color-white">-<?php echo $detail_produk[0]->potongan_harga; ?>%</span>
                                        <span class="price-box__new">Rp<?php echo substr_replace($detail_produk[0]->harga_promo, str_repeat("x", $detail_produk[0]->end_digit - $detail_produk[0]->start_digit + 1), $detail_produk[0]->start_digit - 1, $detail_produk[0]->end_digit - $detail_produk[0]->start_digit + 1); ?></span>
                                        <span class="price-box__old">Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $detail_produk[0]->harga_barang), str_repeat("x", $detail_produk[0]->end_digit - $detail_produk[0]->start_digit + 1), $detail_produk[0]->start_digit - 1, $detail_produk[0]->end_digit - $detail_produk[0]->start_digit + 1); ?></span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="mark bg-red color-white">-<?php echo $detail_produk[0]->potongan_harga; ?>%</span>
                                        <span class="price-box__new">Rp<?php echo $detail_produk[0]->harga_promo; ?></span>
                                        <span class="price-box__old">Rp<?php echo preg_replace("/[,.\s+]/", "", $detail_produk[0]->harga_barang); ?></span>
                                        <?php
                                    }
                                } else {
                                    if ($detail_produk[0]->status_sensor_harga == 1) {
                                        ?>
                                        <span class="price-box__new">
                                            Rp<?php echo substr_replace(preg_replace("/[,.\s+]/", "", $detail_produk[0]->harga_barang), str_repeat("x", ($detail_produk[0]->end_digit - $detail_produk[0]->start_digit) + 1), $detail_produk[0]->start_digit - 1, ($detail_produk[0]->end_digit - $detail_produk[0]->start_digit) + 1); ?>
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="price-box__new">
                                            Rp<?php echo preg_replace("/[,.\s+]/", "", $detail_produk[0]->harga_barang); ?>
                                        </span>
                                        <?php
                                    }
                                }
                                ?>
                                <!--/product price -->
                            </div>
                            <div class="divider divider--xs product-info__divider"></div>
                            <div class="product-info__description">                                
                                <div class="product-info__description__text">
                                    <?php echo $detail_produk[0]->spesifikasi_barang; ?>
                                </div>
                            </div>
                            <div class="divider divider--xs product-info__divider"></div>

                            <?php if ($detail_produk[0]->warna_barang == 0 or $detail_produk[0]->warna_barang == '' or $detail_produk[0]->warna_barang == NULL) { ?>

                            <?php } else { ?>
                                <div class="wrapper">
                                    <div class="pull-left"><span class="option-label"><strong>COLOR: </strong></span>
                                        <span class="required"><strong>*</strong></span></div>
                                    <div class="pull-right required"><b>*required</b></div>
                                </div>
                                <?php
                                $id_warna = $detail_produk[0]->warna_barang;
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

                            <?php if ($detail_produk[0]->ukuran_barang == 0 or $detail_produk[0]->ukuran_barang == '' or $detail_produk[0]->ukuran_barang == NULL) { ?>

                            <?php } else { ?>
                                <div class="wrapper">
                                    <div class="pull-left"><span class="option-label"><strong>SIZE: </strong></span></div>
                                    <div class="pull-left required"><strong>*</strong></div>
                                </div>
                                <?php
                                $id_ukuran = $detail_produk[0]->ukuran_barang;
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
                            <div class="divider divider--sm"></div>
                            <div class="wrapper">
                                <div class="pull-left"><span class="qty-label"><strong>QTY:</strong></span></div>
                                <div class="pull-left">
                                    <!--  -->
                                    <div class="number input-counter">
                                        <span class="minus-btn"></span>
                                        <input type="text" value="1" size="5"/>
                                        <span class="plus-btn"></span>
                                    </div>
                                    <!-- / -->
                                </div>
                                <div class="pull-left"><a href = "https://api.whatsapp.com/send?phone=62<?php echo substr($general_page[0]->contact_bussines, 1); ?>&text=<?php echo site_url('product/detail_product/' . $detail_produk[0]->id_produk) . urlencode("\n") ?> Apakah produk ini masih ada?" target="_blank" type="submit" class="btn btn--ys btn--xxl"><span class="icon icon-call"></span> Whatsapp</a></div>
                            </div>

                        </div>	
                    </div>
                    <div class="content">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs--ys" role="tablist">
                            <li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">Specification Product</a></li>                         
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tab-content--ys">
                            <div role="tabpanel" class="tab-pane active" id="Tab1">                                
                                <table class="table table-responsive table-params">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><span class="color"><strong>Material Product</strong></span></td>
                                            <td><?php echo strtoupper($detail_produk[0]->bahan_produk); ?></td>
                                        </tr>
                                        <?php if ($detail_produk[0]->nama_merek != 0) { ?>     
                                            <tr>
                                                <td class="text-right"><span class="color"><strong>Brand Product</strong></span></td>
                                                <td>
                                                    <?php if ($detail_produk[0]->nama_merek != '' or $detail_produk[0]->nama_merek != NULL) { ?>                               
                                                        <b><?php echo strtoupper($detail_produk[0]->nama_merek); ?></b>
                                                    <?php } else { ?>
                                                        -
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="text-right"><span class="color"><strong>Weight Product</strong></span></td>
                                            <td><?php echo strtoupper($detail_produk[0]->berat_barang); ?> GRAM</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><span class="color"><strong>Minimum Order</strong></span></td>
                                            <td><?php echo strtoupper($detail_produk[0]->minimal_pembelian); ?> ITEM</td>
                                        </tr>
                                        <?php if ($detail_produk[0]->kondisi_barang != 0) { ?>     
                                            <tr>
                                                <td class="text-right"><span class="color"><strong>Condition</strong></span></td>
                                                <td>
                                                    <?php if ($detail_produk[0]->kondisi_barang == 1) { ?>
                                                        PRODUK BARU
                                                    <?php } else if ($detail_produk[0]->kondisi_barang == 2) { ?>
                                                        PRODUK BEKAS
                                                    <?php } else { ?>
                                                        -
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($detail_produk[0]->asal_produk != 0) { ?>     
                                            <tr>
                                                <td class="text-right"><span class="color"><strong>Orgin Product</strong></span></td>
                                                <td>
                                                    <?php if ($detail_produk[0]->asal_produk == 1) { ?>
                                                        LOKAL
                                                    <?php } else { ?>
                                                        IMPOR
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <span class="color"><strong>Tag:</strong></span>
                                <?php
                                $id_array_tag = explode(',', $detail_produk[0]->tag_barang);
                                if (!empty($id_array_tag)) {
                                    foreach ($id_array_tag as $key) {
                                        ?>
                                        <span><i><?php echo strtolower($key); ?></i></span> 
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>						
            </div>
        </div>
    </section>			
    <!-- related products -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <!-- title -->
                    <div class="title-with-button">
                        <div class="carousel-products__center pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                        <h2 class="text-left text-uppercase title-under pull-left">RELATED PRODUCT</h2>
                    </div>
                    <!-- /title --> 
                    <!-- carousel -->
                    <div class="carousel-products row" id="carouselRelated">
                        <?php
                        if (!empty($produk_kategori)) {
                            foreach ($produk_kategori as $key => $value) {
                                ?> 
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-one-six">
                                    <!-- product -->
                                    <?php if ($value->stok_barang == 0) { ?>
                                        <div class="product sold-out">
                                        <?php } else { ?>
                                            <div class="product">
                                            <?php } ?>
                                            <div class="product__inside">
                                                <!-- product image -->
                                                <div class="product__inside__image img-hover-zoom">
                                                    <?php
                                                    if (!empty($gambar_produk_kat)) {
                                                        $i = 0;
                                                        foreach ($gambar_produk_kat as $key => $val) {
                                                            if ($val->token == $value->token) {
                                                                if ($i == 0) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" >
                                                                    <?php
                                                                }
                                                                $i++;
                                                            }
                                                        }  //ngatur nomor urut
                                                        $i = 0;
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/product/product-2.jpg" alt=""> 
                                                    <?php }
                                                    ?>         
                                                    <?php if ($value->stok_barang >= 0) { ?>
                                                        <a href="#" data-toggle="modal" data-target=".produk_kategori<?php echo $value->id_produk; ?>" class="quick-view"><b><span class="icon icon-visibility"></span> see product</b> </a> 
                                                    <?php } else { ?>
                                                        <div class="product__label--sold-out"> <span>SOLD<br>
                                                                OUT</span> 
                                                        </div>
                                                    <?php } ?>
                                                    <!-- quick-view --> 
                                                </div>
                                                <!-- /product image --> 
                                                <!-- label news -->
                                                <?php if ($value->status_rekomendasi == 1) { ?>
                                                    <div class="product__label product__label--right product__label--new"> <span>Recomended</span> </div>
                                                <?php } ?>
                                                <!-- /label news -->
                                                <!-- label sale -->
                                                <?php if ($value->status_promo == 1) { ?>
                                                    <div class="product__label product__label--left product__label--sale"> 
                                                        <span>Discount<br>
                                                            -<?php echo $value->potongan_harga; ?>%</span> 
                                                    </div>
                                                <?php } ?>
                                                <!-- /label sale --> 
                                                <!-- product name -->
                                                <div class="product__inside__name">
                                                    <h2><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><?php echo $value->nama_produk; ?></a></h2>
                                                </div>
                                                <!-- /product name -->                 <!-- product description --> 
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
                    </div>
                </div>
                <div class="hor-line"></div>  
            </div>
        </div>
    </div>
    <!-- /related products -->
</div>
<!-- End CONTENT section --> 
<!-- /modalAddToCart -->   
<?php
if (!empty($produk_kategori)) {
    foreach ($produk_kategori as $key => $value) {
        ?> 
        <!-- Modal (quickViewModal) -->		
        <div class="modal modal--bg fade produk_kategori<?php echo $value->id_produk; ?>"  id="quickViewModal">
            <div class="modal-dialog white-modal">
                <div class="modal-content container">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>                   
                    <div class="product-popup">
                        <div class="product-popup-content">
                            <div class="container-fluid">
                                <div class="row product-info-outer">
                                    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                        <div class="product-main-image">
                                            <div class="product-main-image__item">
                                                <?php
                                                if (!empty($gambar_produk_kat)) {
                                                    foreach ($gambar_produk_kat as $key => $val) {
                                                        if ($val->token == $value->token) {
                                                            ?>
                                                            <img src="<?php echo base_url() . $val->gambar_produk_thumb; ?>" alt="" >
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
                                            <!--<div class="product-info__description__brand"><img src="<?php //echo base_url() . $value->logo_merek_thumb;                                                                                         ?>" alt="" width="100"> </div>-->
                                            <div class="product-info__description__text"><?php echo $limit_word; ?></div>
                                            <ul class="product-link pull-right">                                                   
                                                <li class="text-left">*<span class="icon icon-sort tooltip-link"></span><a href="<?php echo site_url('product/detail_product/' . $value->id_produk . '/' . $value->url_slug) ?>"><span class="text">lebih detail</span></a></li>
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
