<nav itemprop="breadcrumb" class="woocommerce-breadcrumb"><a href="<?php echo site_url('/home'); ?>">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><a href="#">Blog</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><?php echo ucwords($blogid[0]->judul) ?></nav>
<div>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
            <div class="media-attachment">
                <div class="media-attachment-gallery">
                    <div class=" ">
                        <div class="item">
                            <figure>
                                <img width="1000" height="350"src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/blank.gif" data-echo="<?php echo base_url(); ?>/<?php echo $blogid[0]->gambar ?>" class="img-responsive" alt="">
                            </figure>
                        </div><!-- /.item -->
                    </div>
                </div><!-- /.media-attachment-gallery -->
            </div>
            <header class="entry-header">
                <h1 class="entry-title" itemprop="name headline"><?php echo ucwords($blogid[0]->judul) ?></h1>
                <div class="entry-meta">
                    <span class="cat-links"><a href="#" rel="category tag"><?php echo ucwords($blogid[0]->tag) ?></a></span>
                    <span class="posted-on"><a href="#" rel="bookmark"><time class="entry-date published" datetime="2016-03-04T07:34:20+00:00"><?php echo $blogid[0]->date ?></time> <time class="updated" datetime="2016-03-04T18:46:11+00:00" itemprop="datePublished">March 4, 2016</time></a></span>
                </div>
            </header><!-- .entry-header -->
            <div class="entry-content" itemprop="articleBody">
                <p class="highlight">
                    <?php echo $blogid[0]->highlight ?>
                </p>
                <?php echo $blogid[0]->isi_blog ?>
            </div><!-- .entry-content -->
        </article>
    </main><!-- #main -->
</div><!-- #primary -->
<div id="sidebar" class="sidebar-blog" role="complementary">    
    <aside class="widget widget_text">
        <h3 class="widget-title">Tentang Batik</h3>
        <div class="textwidget">
            Batik adalah kain bergambar yang pembuatannya secara khusus dengan menuliskan atau menerakan malam pada kain itu, kemudian pengolahannya diproses dengan cara tertentu yang memiliki kekhasan.
        </div>
    </aside>
    <aside class="widget electro_recent_posts_widget"><h3 class="widget-title">Konten Terkini</h3>
        <ul>
            <?php
            if (!empty($blogrec)) {
                foreach ($blogrec as $key => $value) {
                    ?>
                    <li>
                        <a class="post-thumbnail" href="<?php echo site_url('/blog/konten/'.$value->id); ?>"><img width="150" height="150" src="<?php echo base_url(); ?>/<?php echo $value->gambar; ?>" class="wp-post-image" alt="1"/></a>
                        <div class="post-content">
                            <a class ="post-name" href="<?php echo site_url('/blog/konten/'.$value->id); ?>"><?php echo ucwords($value->judul); ?></a>
                            <span class="post-date"><?php echo $value->date; ?></span>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>             
        </ul>
    </aside>
</div>