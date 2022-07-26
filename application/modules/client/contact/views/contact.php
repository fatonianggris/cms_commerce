<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="index.html" class="icon icon-home"></a></li>										
            <li class="active">Contact</li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs --> 

<!-- CONTENT section -->
<div id="pageContent">
    <section class="container">				
        <div class="row">
            <?php echo $this->session->flashdata('flash_message'); ?>
            <div class="col-md-3 col-sm-12">

                <h2 class="text-uppercase title-bottom">CONTACT</h2>
                <ul class="list-icon">
                    <li>
                        <span class="icon icon-home"></span>
                        <strong>Address :</strong> <?php echo strtoupper($contact[0]->alamat); ?>
                    </li>
                    <li>
                        <span class="icon icon-call"></span>
                        <strong>Telephone:</strong> <?php echo strtoupper($contact[0]->nomor_telephone); ?>
                    </li>
                    <li>
                        <span class="fa fa-fax"></span>
                        <strong>Handphone:</strong> <?php echo strtoupper($contact[0]->no_handphone); ?>
                    </li>
                    <li>
                        <span class="icon icon-schedule"></span>
                        <strong>Work Hours:</strong> <?php echo strtoupper($contact[0]->jam_kerja); ?>
                    </li>
                    <li>
                        <span class="icon icon-mail"></span>
                        <strong>E-mail:</strong> <a class="color" href="mailto:<?php echo $contact[0]->email; ?>"><?php echo $contact[0]->email; ?></a>
                    </li>
                </ul>
                <div class="divider divider--sm"></div>
                <div class="social-links social-links--large">
                    <ul>
                        <li><a class="icon fa fa-facebook" href="<?php echo $contact[0]->akun_facebook; ?>"></a></li>
                        <li><a class="icon fa fa-twitter" href="<?php echo $contact[0]->akun_twitter; ?>"></a></li>
                        <li><a class="icon fa fa-google-plus" href="http://www.google.com/"></a></li>
                        <li><a class="icon fa fa-instagram" href="<?php echo $contact[0]->akun_instagram; ?>"></a></li>                       
                    </ul>
                </div>
            </div>
            <div class="col-md-9  col-sm-12">
                <div class="divider divider--lg visible-xs"></div>
                <h2 class="text-uppercase title-bottom">GET IN TOUCH WITH US</h2>
                <form id="contact_form" enctype="application/x-www-form-urlencoded" method="post" >
                    <!-- input -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputName">Name <sup>*</sup></label>
                                <input type="text" name="nama_pengirim" class="form-control" id="inputName" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputEmail">Email <sup>*</sup></label>
                                <input type="email" name="email" class="form-control" id="inputEmail" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputPhone">No Telephone </label>
                                <input type="number" name="no_telephone" class="form-control" id="inputPhone">
                            </div>
                        </div>
                    </div>
                    <!-- /input -->
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaMessage">Messages <sup>*</sup></label>
                        <textarea class="form-control" name="isi_saran" rows="12" id="textareaMessage" required></textarea>
                    </div>
                    <!-- /textarea -->
                    <!-- button -->
                    <div class="pull-right note">* Required Fields</div>
                    <button class="btn btn--ys btn--xl btn-top" type="submit">Send message</button>
                    <!-- /button -->						   
                </form>						
            </div>
        </div>	
        <div class="hor-line"></div>
    </section>
</div>
<!-- End CONTENT section --> 

<!-- Modal (newsletter) -->		
<div class="modal modal--bg fade" id="success_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title">Thank You For Reaching Out To Us :)</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--bg fade" id="error_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title color-red">oops.. something went wrong :(</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--bg fade" id="error_net_modal">
    <div class="modal-dialog white-modal">
        <div class="modal-content modal-md">
            <div class="modal-bg-image bottom-right"> 
                <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/images/newsletter-bg.png" alt="" class="img-responsive"> 
            </div>
            <div class="modal-block">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-newsletter text-center">
                    <img class="logo img-responsive1 replace-2x" src="<?php echo base_url() . $general_page[0]->logo_website; ?>" alt=""/>
                    <h1 class="text-uppercase modal-title color-red">please check your network connection !!</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/landing_page_asset/assets/external/bootstrap/bootstrap.min.js"></script> 
<script>

    $(function () {
        $('#contact_form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('contact/post_contact'); ?>',
                data: $('#contact_form').serialize(),
                success: function (result) {
                    if (result == 1) {
                        $("#success_modal").modal('show');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        $("#error_modal").modal('show');
                    }
                },
                error: function (result) {
                    $("#error_net_modal").modal('show');
                }
            });

        });

    });
</script>