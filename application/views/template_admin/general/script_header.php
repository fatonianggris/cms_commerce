<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/favicon.png">
<title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" >
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.3/cropper.css">
<!-- Color picker plugins css -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
<!-- Popup CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/animate.css" rel="stylesheet">
<!-- wysihtml5 CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet"/>
<!-- Dropzone css -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
<!-- Datatables -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Menu CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- morris CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/colors/megna.css" id="theme" rel="stylesheet">
<!-- jQuery -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!--Morris JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/morrisjs/morris.js"></script>
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        font-weight: normal;
    }
    tfoot{
        display: table-header-group;

    }
    .modal-pesanan {
        max-width: 1200px;
    }
    .modal-blog2 {
        border-radius: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,.1);
        background-color: white; 
        margin-top: 200px;
    }
    .modal-color {
        background:  #edf1f5;
    }
    .side-gabungan {
        text-align: center!important;
    }
    .span-gabungan {
        margin-top: 5px;
    }
    .a-gabungan{
        text-align: center;
    }
    .fa-fw-gab{
        width: 100%!important;
        display: block!important;
        text-align: center!important;

    }
    .btn-new-sm{
        font-weight: 500;
        line-height: 1
    }
    .select2-hidden-accessible {
        top: 50px;
    }
    .user-bg2 {
        margin: -25px;
        height: 300px;
        overflow: hidden;
        position: relative
    }
    .select2-offscreen,
    .select2-offscreen:focus {

        left: auto !important;
        top: auto !important;
    }
    .text-atur{
        margin: 0px 0;
        font-weight: 600;
    }
    .new-hr{
        margin-top: -10px;
    }
    .err-val {
        margin-bottom: 0rem;
    }
    .disabled{
        pointer-events: none;
    }
    .clear-td{
        display: none;
    }
    .label-detail{
        letter-spacing: .05em;
        border-radius: 60px;
        padding: 2px 11px 3px;
        font-weight: 500
    }
    .modal-crop{
        margin-top: 300px;
    }
    .modal-img-crop{
        height: 400px;
    }

    .pro-box .banner-img-disp{
        height: 400px;
    }
    .error-body-dev{padding-top:3%}
    .error-body-dev h1{font-size:160px;font-weight:900;line-height:135px}

    .select-chart{
        font:initial;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }
</style>
