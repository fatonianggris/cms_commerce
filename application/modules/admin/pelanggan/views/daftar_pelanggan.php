<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Pelanggan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/add_produk'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Produk </a>
            <ol class="breadcrumb">               
                <li><a href="#">Pelanggan</a></li>
                <li class="active">Daftar Pelanggan</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Pelanggan Toko</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="pelanggan" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Jumlah Transaksi</th>                               
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>No Telepon</th>                                                                           
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td><b>Tiger Nixon</b></td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td><div class="label label-table label-success"><i class="fa fa-money"></i> Transaksi -> </div></td>
                                <td>
                                    <a href="<?php echo site_url('pelanggan/detail_pelanggan/'); ?>" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>                                           
                                    <a onclick="act_suspend_pelanggan(<?php ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-warning"></i></button></a>
                                </td>
                            </tr>
                    </table>as
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>