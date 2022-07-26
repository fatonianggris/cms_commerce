<ul class="expander-list">				
    <li>
        <span class="name">           
            <a href="<?php echo site_url('home') ?>"><span class="act-underline">HOME</span></a>
        </span>       
    </li>	
    <li>
        <span class="name">           
            <a href="<?php echo site_url('product/new_arrivals') ?>"><span class="act-underline">NEW ARRIVAL's<span class="badge badge--menu badge--color">LIMITED</span></span></a>
        </span>       
    </li>
    <li>
        <span class="name">
            <span class="expander">-</span>
            <a href=""><span class="act-underline">CATEGORY</span></a>
        </span>
        <ul class="multicolumn-level">
            <?php
            if (!empty($kategori)) {
                foreach ($kategori as $key => $val) {
                    ?>
                    <li>
                        <span class="name">
                            <span class="expander">-</span>
                            <a class="megamenu__subtitle" href="<?php echo site_url('product/search_product?kat=' . strtolower($val->nama_kategori)) ?>">										
                                <span><?php echo strtoupper($val->nama_kategori); ?></span>
                            </a>
                        </span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <?php
                            if (!empty($sub_kategori)) {
                                foreach ($sub_kategori as $key => $values) {
                                    if ($values->id_level == $val->id_kategori) {
                                        ?>
                                        <li class="level3"><a href="<?php echo site_url('product/search_product?kat=' . strtolower($values->nama_kategori)) ?>"><?php echo strtoupper($values->nama_kategori); ?></a></li>									
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
            ?>           
        </ul>
    </li>
    <li>
        <span class="name">           
            <a href="<?php echo site_url('faqs/detail_faq') ?>"><span class="act-underline">FAQ's</span></a>
        </span>       
    </li>
    <li>
        <span class="name">           
            <a href="<?php echo site_url('contact/contact_us') ?>"><span class="act-underline">CONTACT US</span></a>
        </span>       
    </li>
</ul>
