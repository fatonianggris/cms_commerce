<?php $user = $this->session->userdata('batikpati'); ?>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
<!--            <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li>
                        <div class="drop-title">You have 4 new messages</div>
                    </li>
                    <li>
                        <div class="message-center">
                            <a href="#">
                                <div class="user-img"> <img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                            </a>
                            <a href="#">
                                <div class="user-img"> <img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                            </a>
                            <a href="#">
                                <div class="user-img"> <img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                            </a>
                            <a href="#">
                                <div class="user-img"> <img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
                 /.dropdown-messages 
            </li>                     -->
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo ucwords($user[0]->nama); ?></b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>                  
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>                      
            <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
</nav>