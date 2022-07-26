<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="index.html" class="icon icon-home"></a></li>					
            <li class="active">FAQS</li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
    <div class="container">				
        <!-- two col -->
        <div class="row">					
            <!-- center-col -->
            <div class="col-md-12">
                <!-- title -->
                <div class="title-box">
                    <h1 class="text-center text-uppercase title-under">FAQ'S</h1>
                </div>   
                <h2></h2>
                <!--  -->
                <?php
                if (!empty($faqs)) {
                    foreach ($faqs as $key => $value) {
                        ?> 
                        <div class="collapse-block open collapse-block--indent-lg">
                            <h4 class="collapse-block__title collapse-block__icon-left"><?php echo $value->pertanyaan; ?></h4>
                            <div class="collapse-block__content">
                                <?php echo $value->jawaban; ?>
                            </div>
                        </div>
                        <?php
                    }  //ngatur nomor urut
                }
                ?>   
                <!-- / -->
            </div>
            <!-- /center-col -->

        </div>
        <!-- /two col -->
        <div class="hor-line"></div>
    </div>
</div>
<!-- End CONTENT section --> 