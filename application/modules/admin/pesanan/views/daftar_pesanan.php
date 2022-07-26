<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Pesanan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/add_produk'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Produk </a>
            <ol class="breadcrumb">               
                <li><a href="#">Pesanan</a></li>
                <li class="active">Daftar Pesanan</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Pesanan Toko</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="pesanan" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td><span class="label label-danger">admin</span></td>
                                <td>2011/04/25</td>
                                <td>
                                    <a href="#modal-tag" data-toggle="modal" >
                                        <button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button>
                                    </a>
                                    <button class="btn btn-outline btn-warning btn-sm waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-outline btn-success btn-sm waves-effect waves-light"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-remove"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td><span class="label label-danger">admin</span></td>
                                <td>2011/04/25</td>
                                <td>
                                    <button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-outline btn-warning btn-sm waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-outline btn-success btn-sm waves-effect waves-light"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-remove"></i></button>
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
<div class="modal fade modal fade bs-example-modal-lg" id="modal-tag" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-pesanan">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Detail Pesanan Pelanggan</h4>
                <small>Detail Pesanan Pelanggan Produk Toko Anda</small>
            </div>
            <div class="modal-body modal-color">           
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <h3><b>KODE PEMESANAN</b> <span class="pull-right">ID #5669626</span></h3>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Item</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="../plugins/images/chair.jpg" alt="iMac" width="80"></td>
                                        <td>Rounded Chair</td>
                                        <td>20</td>
                                        <td class="font-500">$153</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="font-500" align="right"><b>Total Amount</b></td>
                                        <td class="font-500"><b>$153<b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>               
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">            
                    <div class="white-box">
                        <h3 class="box-title">Cart Summary</h3>
                        <div class="table-responsive">
                             <table class="table">
                                 <tbody>
                                     <tr>
                                         <td width="100"><b>Total Harga</b></td>
                                         <td>Stellar </td>
                                     </tr>
                                     <tr>
                                         <td><b>Diskon</b></td>
                                         <td>Knock Down </td>
                                     </tr>
                                     <tr>
                                         <td><b>Pengiriman</b></td>
                                         <td>Knock Down </td>
                                     </tr>
                                     <tr>
                                         <td><h3><b>Total</b></h3></td>
                                         <td><h3>Total</h3> </td>
                                     </tr>
                                 </tbody>
                             </table>                                  
                         </div>                   
                    </div>               
                </div> 
                <div class="col-md-4 col-xs-12">            
                    <div class="white-box">
                        <h3 class="box-title">Cart Summary</h3>
                        <small>Total Price</small>
                        <h2>$612</h2>                       
                    </div>               
                </div> 
                <div class="col-md-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Cart Summary</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="100"><b>Total Harga</b></td>
                                        <td>Stellar </td>
                                    </tr>
                                    <tr>
                                        <td><b>Diskon</b></td>
                                        <td>Knock Down </td>
                                    </tr>
                                    <tr>
                                        <td><b>Pengiriman</b></td>
                                        <td>Knock Down </td>
                                    </tr>
                                    <tr>
                                        <td><h3><b>Total</b></h3></td>
                                        <td><h3>Total</h3> </td>
                                    </tr>
                                </tbody>
                            </table>                                  
                        </div>
                    </div>
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>