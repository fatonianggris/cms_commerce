<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Detail Pelanggan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/add_produk'); ?>" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Produk </a>
            <ol class="breadcrumb">               
                <li><a href="#">Pelanggan</a></li>
                <li class="active">Detail Pelanggan</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class=" text-center p-t-20">
                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/users/agent.jpg"></a>
                    <h4>Jon Doe</h4>
                    <h6>Pelanggan</h6>
                </div>
                <div class="user-btm-box">
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Nama Pelanggan</strong>
                            <p>Jonathan Doe</p>
                        </div>
                        <div class="col-md-6"><strong>Status</strong>
                            <p>Pelanggan</p>
                        </div>
                    </div>
                    <!-- /.row -->                   
                    <hr>
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Alamat</strong>
                            <p>E104, Dharti-2, Chandlodia Ahmedabad
                                <br/> Gujarat, India.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <h4>Detail Laporan Pelanggan "xxx"</h4>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                        <br>
                        <p class="text-muted">Johnathan Deo</p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>No. Telepon</strong>
                        <br>
                        <p class="text-muted">(123) 456 7890</p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                        <br>
                        <p class="text-muted">john@admin.com</p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Total Transaksi</strong>
                        <br>
                        <p class="text-muted">
                            <div class="label label-table label-success">10 transaksi</div>
                        </p>
                    </div>
                </div>              
                <hr>

                <table data-toggle="table" data-height="400" data-mobile-responsive="true" class="table-striped">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="tr-id-1" class="tr-class-1">
                            <td id="td-id-1" class="td-class-1"> bootstrap-table </td>
                            <td>526</td>
                            <td>122</td>
                            <td>122</td>
                            <td>An extended Bootstrap table with radio, checkbox, sort, pagination, and other added features. (supports twitter bootstrap v2 and v3) </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>