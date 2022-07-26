<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script> 
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jasny-bootstrap.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/validator.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Magnific popup JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
<!-- Treeview Plugin JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-treeview-master/dist/bootstrap-treeview.min.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-table/dist/bootstrap-table.ints.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.3/cropper.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<script>
    $(".colorpicker").asColorPicker();

    $('#pesanan tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#pesanan').DataTable();
// Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });

    $('#pelanggan tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#pelanggan').DataTable();
// Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });

    $('#kategori').DataTable({
        order: []
    });
    $('#vouch').DataTable({
        order: []
    });
    $('#merek').DataTable({
        order: []
    });
    $('#warna').DataTable({
        order: []
    });
    $('#alatbayar').DataTable({
        order: []
    });

</script>
<script>
    $('#produk tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#produk').DataTable({
        order: []
    });
// Apply the search
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();
    });
</script>

<script>

    $('#spesifikasiproduk').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": true, //Button to insert a link.
        "image": false, //Button to insert an image.      
    });
    $('#petunjuk').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": false, //Button to insert a link.
        "image": false, //Button to insert an image.      
    });
    $('#catatan').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": false, //Button to insert a link.
        "image": false, //Button to insert an image.      
    });
    $('#konten_blog').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": true, //Button to insert a link.
        "image": true, //Button to insert an image.      
    });
    $('#faq').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": true, //Button to insert a link.
        "image": true, //Button to insert an image.      
    });

</script>


