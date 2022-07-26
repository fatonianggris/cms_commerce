<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-6 col-xl-7">
            <!-- logo start --> 
            <a href=""><img class="logo replace-2x img-responsive" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/> </a> 
            <!-- logo end --> 
        </div>
        <div class="col-sm-8 col-md-8 col-lg-6 col-xl-5 text-right">
            <!-- slogan start -->
            <div class="slogan"><?php echo ucfirst($general_page[0]->greeting_website); ?> </div>
            <!-- slogan end --> 						
            <div class="settings ">               
                <!-- language start -->
                <!-- language start -->
                <div class="language dropdown text-right">

                </div>
                <!-- language end --> 
                <!-- language end --> 
            </div>
        </div>
    </div>
</div>
<div class="stuck-nav">
    <div class="container offset-top-5">
        <div class="row">
            <div class="col-sm-9 col-md-9 col-lg-10">
                <!-- navigation start -->
                <nav class="navbar">
                    <div class="responsive-menu mainMenu">									
                        <!-- Mobile menu Button-->
                        <div class="col-xs-2 visible-mobile-menu-on">
                            <div class="expand-nav compact-hidden">
                                <a href="#off-canvas-menu" class="off-canvas-menu-toggle">
                                    <div class="navbar-toggle"> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span> 
                                        <span class="menu-text">MENU</span> 
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- //end Mobile menu Button -->
                        <ul class="nav navbar-nav">
                            <li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>										
                            <li class="dropdown dropdown-mega-menu">											
                                <a href="<?php echo site_url('home') ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">HOME</span></a>
                            </li>	
                            <li class="dropdown dropdown-mega-menu">											
                                <a href="<?php echo site_url('product/new_arrivals') ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">NEW ARRIVAL'S<span class="badge badge--menu badge--color">NEW</span></span></a>
                            </li>
                            <li class="dropdown dropdown-mega-menu dropdown-four-col">
                                <span class="dropdown-toggle extra-arrow"></span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">CATEGORY</span></a>                             
                                <ul class="dropdown-menu megamenu col-lg-12" role="menu">  

                                    <?php
                                    if (!empty($kategori)) {
                                        $i = 1;
                                        foreach ($kategori as $key => $val) {
                                            ?>
                                            <li class="col-sm-3">												
                                                <a href="<?php echo site_url('product/search_product?kat=' . strtolower($val->nama_kategori)) ?>" class="megamenu__subtitle">
                                                    <span><?php echo strtoupper($val->nama_kategori); ?></span>
                                                    <span class="megamenu__category-image hidden-xs"><img class="img-responsive" src="<?php echo base_url() . $val->gambar_kategori_thumb; ?>" alt="" width="250" height="250"/></span>
                                                </a>
                                                <ul class="megamenu__submenu">
                                                    <?php
                                                    if (!empty($sub_kategori)) {
                                                        foreach ($sub_kategori as $key => $values) {
                                                            if ($values->id_level == $val->id_kategori) {
                                                                ?>
                                                                <li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
                                                                <li class="level2">
                                                                    <a href="<?php echo site_url('product/search_product?kat=' . strtolower($values->nama_kategori)) ?>"><?php echo ucwords($values->nama_kategori); ?></a>
                                                                    <ul class="megamenu__submenu">     
                                                                        <?php
                                                                        if (!empty($sub_kategori)) {
                                                                            foreach ($sub_kategori as $key => $valuess) {
                                                                                if ($valuess->id_level == $values->id_kategori) {
                                                                                    ?>
                                                                                    <li class="level3"><a href="listing.html">Bodycon Dresses</a></li>                                                                       
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>         
                                                                    </ul>
                                                                </li> 
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>         
                                                </ul>
                                            </li>
                                            <?php
                                            if (($i % 4) == 0) {
                                                ?>
                                                <div class="col-lg-12"></div>
                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?> 

                                </ul>
                            </li>
                            <li class="dropdown dropdown-mega-menu">											
                                <a href="<?php echo site_url('faqs/detail_faq') ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">FAQ'S</span></a>
                            </li>
                            <li class="dropdown dropdown-mega-menu">											
                                <a href="<?php echo site_url('contact/contact_us') ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">CONTACT US</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- navigation end -->
            <div class="pull-right col-sm-3 col-md-3 col-lg-2">
                <div class="text-right">	
                    <!-- search start -->
                    <div class="search link-inline">
                        <a href="#" class="search__open"><span class="icon icon-search"></span></a>
                        <div class="search-dropdown">
                            <form action="<?php echo site_url('product/search_product'); ?>" method="get">
                                <div class="input-outer">
                                    <?php if (isset($_GET['kat'])) { ?>
                                        <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>"  />
                                    <?php }
                                    ?>
                                    <?php if (isset($_GET['prc_min'])) { ?>
                                        <input type="hidden" name="prc_min" value="<?php echo $_GET['prc_min'] ?>"  />
                                    <?php }
                                    ?>
                                    <?php if (isset($_GET['prc_max'])) { ?>
                                        <input type="hidden" name="prc_max" value="<?php echo $_GET['prc_max'] ?>"  />
                                    <?php }
                                    ?>
                                    <?php if (isset($_GET['name'])) { ?>
                                        <input type="search" name="name"  maxlength="128"  value="<?php echo $_GET['name'] ?>"  />
                                    <?php } else { ?>
                                        <input type="search" name="name" maxlength="128" placeholder="SEARCH:">
                                    <?php }
                                    ?>
                                    <button type="submit" title="" class="icon icon-search"></button>
                                </div>
                                <a href="#" class="search__close"><span class="icon icon-close"></span></a>									
                            </form>
                        </div>
                    </div>
                    <!-- search end -->									
                    <!-- shopping cart start -->
                    <div class="cart link-inline">
                        <div class="dropdown text-right">                            
                            <a href = "https://api.whatsapp.com/send?phone=62<?php echo substr($general_page[0]->contact_bussines, 1); ?>&text=Permisi, mau tanya?" target="_blank">  <span class="icon icon-call"></span></a>                                                                                                         
                        </div>
                        <!-- shopping cart end -->			
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
