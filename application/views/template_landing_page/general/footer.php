<!-- footer-data -->
<div class="container inset-bottom-60">
    <div class="row row-bottom-new" >
        <div class="col-sm-12 col-md-8 col-lg-8 border-sep-right">
            <div class="footer-logo hidden-xs">
                <!--  Logo  --> 
                <a class="logo" href="index.html"> <img class="replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>"  alt="YOURStore"> </a> 
                <!-- /Logo --> 
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="box-about">
                    <div class="mobile-collapse_new mobile-collapse">
                        <h4 class="mobile-collapse__title visible-xs">ABOUT US</h4>
                        <div class="mobile-collapse__content">
                            <p> <?php echo $general_page[0]->about_website; ?></p>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
                <address class="box-address hidden-xs">
                    <span class="icon icon-home"></span> <?php echo $contact[0]->alamat; ?> <br>
                    <span class="icon icon-call"></span> <b class="color-dark">+62 <?php echo substr($contact[0]->no_handphone, 1); ?> </b><br>
                    <span class="icon icon-access_time"></span> <?php echo $contact[0]->jam_kerja; ?><br>
                    <span class="icon icon-markunread"></span> <a class="color" href="mailto:<?php echo $contact[0]->email; ?>"><?php echo $contact[0]->email; ?></a>
                </address>

            </div>
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 border-sep-left">
            <div class="row">
                <div class="col-sm-4">
                    <div class="mobile-collapse">
                        <h4 class="text-left  title-under  mobile-collapse__title">CATEGORY</h4>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                <?php
                                if (!empty($kategori)) {
                                    foreach ($kategori as $key => $val) {
                                        ?>
                                        <li><a href="<?php echo site_url('product/search_product?kat=' . strtolower($val->nama_kategori)) ?>"><?php echo ucwords(strtolower($val->nama_kategori)); ?></a></li> 
                                        <?php
                                    }
                                }
                                ?>         
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mobile-collapse">
                        <h4 class="text-left  title-under  mobile-collapse__title">INFORMATION</h4>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                <li><a href="<?php echo site_url('faqs/detail_faq') ?>">FAQ</a></li>
                                <li><a href="<?php echo site_url('contact/contact_us') ?>">Contact Us</a></li> 
                                <li><a href="<?php echo site_url('contact/contact_us') ?>">About Us</a></li>                               
                                <li><a href="faq.html">Privacy Policy</a></li>  
                            </ul>
                        </div>
                    </div>
                </div>     
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /footer-data --> 
<div class="divider divider-md visible-xs visible-sm visible-md"></div>
<!-- social-icon -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="social-links social-links--large">
                <ul>
                    <li><a class="icon fa fa-facebook" href="<?php echo $contact[0]->akun_facebook; ?>"></a></li>
                    <li><a class="icon fa fa-twitter" href="<?php echo $contact[0]->akun_twitter; ?>"></a></li>
                    <li><a class="icon fa fa-google-plus" href="http://www.google.com/"></a></li>
                    <li><a class="icon fa fa-instagram" href="<?php echo $contact[0]->akun_instagram; ?>"></a></li>                   
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /social-icon --> 
<!-- footer-copyright -->
<div class="container footer-copyright">
    <div class="row">
        <div class="col-lg-12"> <a href="#"><span><?php echo $general_page[0]->nama_website; ?></span></a> &copy; 2020 . All Rights Reserved. </div>
    </div>
</div>
<!-- /footer-copyright --> 
<a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a> 