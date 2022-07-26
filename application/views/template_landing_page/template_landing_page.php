<!DOCTYPE html>
<html lang="en-US" >
    <head>
        <?php
        $this->load->view('template_landing_page/general/script_header');
        ?>
    </head>

    <body class="index">
        <div id="loader-wrapper">
            <div id="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>                
            </div>
        </div>
        <!-- Back to top -->
        <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>

        <!-- mobile menu -->
        <div class="hidden">
            <nav id="off-canvas-menu">
                <?php
                $this->load->view('template_landing_page/general/mobile_header_menu');
                ?>
            </nav>
        </div>		
        <!-- /mobile menu -->

        <!-- HEADER section -->
        <div class="header-wrapper">
            <header id="header">
                <?php
                $this->load->view('template_landing_page/general/web_header_menu');
                ?>
            </header>
        </div>
        <!-- End HEADER section -->

        <!-- content -->
        <div>
            <?php
            echo $contents;
            ?>
        </div>
        <!-- end content -->

        <footer>
            <?php
            $this->load->view('template_landing_page/general/footer');
            ?>
        </footer><!-- #colophon -->

        <!-- script -->
        <?php
        $this->load->view('template_landing_page/general/script_footer');
        ?>
    </body>
</html>
