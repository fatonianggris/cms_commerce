<!-- jQuery 1.10.1--> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/js/custom.js"></script>
<!-- Bootstrap 3--> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/bootstrap/bootstrap.min.js"></script> 
<!-- Specific Page External Plugins --> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/slick/slick.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/bootstrap-select/bootstrap-select.min.js"></script>  
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/countdown/jquery.plugin.min.js"></script> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/countdown/jquery.countdown.min.js"></script>  		 		
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/magnific-popup/jquery.magnific-popup.min.js"></script>  		
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/isotope/isotope.pkgd.min.js"></script> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/nouislider/nouislider.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/imagesloaded/imagesloaded.pkgd.min.js"></script> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/elevatezoom/jquery.elevatezoom.js"></script>
<!-- Custom --> 
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- Custom --> 
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/js/js-index-01.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/js/js-product.js"></script>

<script>

// Price Slider initialize
    function priceSlider() {

        if ($j('.price-slider').length) {

            var priceSlider = document.getElementById('priceSlider');
<?php if (isset($_GET['prc_min'])) { ?>
                noUiSlider.create(priceSlider, {
                    start: [<?php echo $_GET['prc_min'] ?>, <?php echo $_GET['prc_max'] ?>],
                    connect: true,
                    step: 1000,
                    range: {
                        'min': 0,
                        'max': 1000000
                    }
                });
<?php } else { ?>
                noUiSlider.create(priceSlider, {
                    start: [100000, 500000],
                    connect: true,
                    step: 1000,
                    range: {
                        'min': 0,
                        'max': 1000000
                    }
                });
<?php } ?>

            var inputPriceMax = document.getElementById('priceMax');
            var inputPriceMin = document.getElementById('priceMin');

            priceSlider.noUiSlider.on('update', function (values, handle) {

                var value = values[handle];

                if (handle) {
                    inputPriceMax.value = ~~value;
                } else {
                    inputPriceMin.value = ~~value;
                }
            });

            inputPriceMax.addEventListener('change', function () {
                priceSlider.noUiSlider.set([null, this.value]);
            });
            inputPriceMin.addEventListener('change', function () {
                priceSlider.noUiSlider.set([this.value, null]);
            });
        }
        ;
    }
</script>