<!-- Basic -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . $seo[0]->gambar_page_seo ?>">
<?php
$this->ci_seo->set_tags($seo[0]->judul_page_seo, $seo[0]->deskripsi_page, $seo[0]->keywords, $seo[0]->copyright, $seo[0]->gambar_page_seo, $seo[0]->id_twitter, $seo[0]->id_fb_page, $seo[0]->id_fb_app, $seo[0]->status_robot, $seo[0]->status_boosting, $seo[0]->canonical);
?>
<meta name="author" content="Abang Shop 21">
<meta name="publisher" content="Abang Shop 21" />
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- External Plugins CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/slick/slick.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/slick/slick-theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/magnific-popup/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/bootstrap-select/bootstrap-select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/nouislider/nouislider.css">
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/rs-plugin/css/settings.css" media="screen" />
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/css/style.css">
<!-- Icon Fonts  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/font/style.css">
<!-- Head Libs -->	
<style>
    .row-contact_us{
        border-bottom: 1px solid #e5e5e5;
    }

    .header_seo{
        visibility: hidden;
        position: relative;
        z-index: 9999;
        font-size: 0px;

    }
    .row-bottom-new{
        font-weight: 400;
    }

    .img-hover-zoom {       
        overflow: hidden; /* [1.2] Hide the overflowing of child elements */
    }

    /* [2] Transition property for smooth transformation of images */
    .img-hover-zoom img {
        transition: transform .5s ease;
    }

    /* [3] Finally, transforming the image when container gets hovered */
    .img-hover-zoom:hover img {
        transform: scale(1.1);
    }

    @media (min-width: 1050px) {
        .img-cat{
            height: 374px;
            width: 374px;
        }
    }

    @media (min-width: 1750px) {
        .img-cat{
            height: 510px;
            width: 374px;
        }
    }

    @media (max-width: 767px){
        .mobile-collapse_new{
            padding-left: 0;
            padding-right: 0;
        }
    }
    .row-functional-link {
        padding-top: 1px;
    }

    .h-address {
        font-weight: 300;
        position: relative;
        top: -8px;
        line-height: 1.5;
    }
    .h-address .icon {
        color: #1fc0a0;
        font-size: 20px;
        position: relative;
        top: 4px;
    }

    .h-address b {
        color: #333333;
        font-size: 18px;
    }
</style>
<!-- Modernizr -->
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/modernizr/modernizr.js"></script>
