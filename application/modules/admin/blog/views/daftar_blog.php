<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Blog</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Blog </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Blog</a></li>
                <li class="active">Daftar Blog</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">All Properties</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-home text-info"></i></li>
                    <li class="text-right"><span class="counter">480</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Properties for Sale</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-purple"></i></li>
                    <li class="text-right"><span class="counter">169</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Properties for Rent</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-basket text-danger"></i></li>
                    <li class="text-right"><span class="counter">311</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Ernings</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-wallet text-success"></i></li>
                    <li class="text-right"><span class="counter">$8170</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->

    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Blog Website</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Foto Header</th>
                                <th>Judul</th>  
                                <th>Tag</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>System Architect</td>
                                <td>
                                    <button data-toggle="modal" data-target=".modal-lihatblog" class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-outline btn-warning btn-sm waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                </td>                                
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Tokyo</td>
                                <td>System Architect</td>
                                <td>
                                    <button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-outline btn-warning btn-sm waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>
    <!-- /.row -->
</div>
<!-- sample modal tag -->
<div class="modal fade modal-lihatblog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Detail Blog</h4>
                <small>Detail Terkait Konten Blog </small>
            </div>
            <div class="modal-body">          
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mail_listing">

                    <div class="media m-b-30 p-t-20">
                        <div class="user-bg2 text-center">
                            <img width="100%" alt="user" src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/large/img1.jpg">
                        </div>
                        <br>
                        <br>
                        <h4 class="font-bold m-t-0">Your message title goes here</h4>
                        <hr>
                        <a class="pull-left" href="#"> <img class="media-object thumb-sm img-circle" src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/pawandeep.jpg" alt=""> </a>
                        <div class="media-body"> <span class="media-meta pull-right">07:23 AM</span>
                            <h4 class="text-danger m-0">Pavan kumar</h4>
                            <small class="text-muted">From: jonathan@domain.com</small> </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                    <p>enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
