<ul class="nav" id="side-menu">
    <li><a href="<?php echo site_url('dashboard'); ?>" class="waves-effect"><i class="linea-icon linea-ecommerce fa-fw" data-icon="S"></i> <span class="hide-menu">Dashboard <span class="fa arrow"></span> </span></a>
    </li>                      
    <li><a href="<?php echo site_url('produk/'); ?>" class="waves-effect"><i data-icon="p" class="linea-icon linea-ecommerce fa-fw"></i> <span class="hide-menu">Produk <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo site_url('produk/daftar_produk'); ?>">Daftar Produk</a></li>
            <li><a href="<?php echo site_url('produk/voucher/daftar_voucher'); ?>">Daftar Voucher</a> </li> 
            <li><a href="<?php echo site_url('produk/add_produk'); ?>">Tambah Produk</a></li> 
            <li><a href="<?php echo site_url('produk/sizewarna/daftar_size_warna'); ?>">Size & Warna Produk</a> </li> 
        </ul>
    </li>  
    <li> <a href="<?php echo site_url('pesanan/daftar_pesanan'); ?>" class="waves-effect"><i data-icon="d" class="linea-icon linea-ecommerce fa-fw"></i> <span class="hide-menu">Pesanan </span></a> </li>
    <li> <a href="<?php echo site_url('alatbayarkurir/'); ?>" class="waves-effect a-gabungan"><i data-icon="K" class="linea-icon linea-ecommerce side-gabungan"></i> <i data-icon="B" class="linea-icon linea-ecommerce side-gabungan"></i><span class="hide-menu fa-fw-gab span-gabungan">Alat Bayar & Kurir</span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('alatbayarkurir/daftar_alatbayar_kurir'); ?>">Daftar Alat Bayar & Kurir</a> </li>
            <li> <a href="<?php echo site_url('alatbayarkurir/add_alatbayar'); ?>">Tambah Alat Bayar</a> </li>  

        </ul>
    </li> 
    <li> <a href="<?php echo site_url('kategorimerek/daftar_kategori_merek'); ?>" class="waves-effect"><i data-icon=";" class="linea-icon linea-ecommerce fa-fw"></i> <span class="hide-menu">Kategori & Merek </span></a> </li>
<!--    <li> <a href="<?php echo site_url('pelanggan/daftar_pelanggan'); ?>" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Pelanggan </span></a> </li>
    <li> <a href="<?php echo site_url('laporan/'); ?>" class="waves-effect"><i data-icon="3" class="linea-icon linea-ecommerce fa-fw"></i> <span class="hide-menu">Laporan </span></a>
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('laporan/daftar_laporan_penjualan'); ?>">Laporan Penjualan</a></li>
            <li> <a href="<?php echo site_url('laporan/daftar_laporan_produk'); ?>">Laporan Produk</a> </li>            
        </ul>
    </li>
    <li> 
        <a href="<?php echo site_url('blog/'); ?>" class="waves-effect"><i data-icon="n" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('blog/daftar_blog'); ?>">Daftar Blog</a> </li>
            <li> <a href="<?php echo site_url('blog/add_blog'); ?>">Tambah Blog</a> </li>             
        </ul>
    </li>-->
    <li> <a href="<?php echo site_url('faq/daftar_faq'); ?>" class="waves-effect"><i data-icon="~" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">FAQ </span></a> </li>
    <li> <a href="<?php echo site_url('pengaturan/'); ?>" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Pengaturan </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('pengaturan/kontak/daftar_kontak'); ?>">Kontak Website</a> </li>
            <li> <a href="<?php echo site_url('pengaturan/generalpage/daftar_generalpage'); ?>">General Page Website</a> </li>  
            <li> <a href="<?php echo site_url('mailer/mail'); ?>">Konfigurasi Mail</a> </li>       
            <li> <a href="<?php echo site_url('smsgateway/sms/'); ?>">Konfigurasi SMS Gateway</a> </li>           
        </ul>
    </li>
</ul>