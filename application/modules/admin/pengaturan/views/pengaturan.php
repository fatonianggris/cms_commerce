
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Pengaturan</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengaturan</a></li>
                <li class="breadcrumb-item active">Pengaturan Landing Page</li>
            </ol>           
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-info">
                    <h3 class="text-white box m-b-0"><i class="ti-tag"></i></h3></div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0 text-info"><?php echo $count[0]->kat; ?></h3>
                    <h5 class="text-muted m-b-0">Jumlah Kategori</h5></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-warning">
                    <h3 class="text-white box m-b-0"><i class="ti-palette"></i></h3></div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0 text-warning"><?php echo $count[0]->banner; ?></h3>
                    <h5 class="text-muted m-b-0">Jumlah Banner</h5></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-success">
                    <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0 text-success"><?php echo $count[0]->user; ?></h3>
                    <h5 class="text-muted m-b-0">Jumlah User</h5></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
</div>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
        <?php echo $this->session->flashdata('flash_message'); ?>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kategori </h4>
                <h6 class="card-subtitle">Silahkan tambah kategori yang sesuai </h6>               
                <div class="table-responsive ">
                    <table id="tabel_kategori" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($kat)) {
                                $i = 1;
                                foreach ($kat as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->nama_kat; ?></td>                               
                                        <td>                                           
                                            <a href="#edit_kategori<?php echo $value->id; ?>" data-toggle="modal"> <button type="button" class="btn btn-info btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
                                            <a onclick="act_del_kat(<?php echo $value->id; ?>)" ><button type="button" class="btn btn-danger btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-toggle="modal" data-original-title="Hapus"><i class="ti-close" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>              
                        </tbody>
                        <tfoot>
                        <button type="button" class="btn btn-info btn-rounded right-side-toggle" data-toggle="modal" data-target="#tambah_kategori">Tambah Kategori</button>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="tambah_kategori" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Kategori Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/tambah_kategori'); ?>" enctype="multipart/form-data" method="post">
                    <div class="modal-body">                   
                        <div class="form-group">
                            <label>Input Nama Kategori</label>
                            <div class="col-md-12 m-b-20">
                                <input type="text" name="nama_kat" class="form-control" placeholder="Inputkan nama kategori">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Icom</label>
                            <div class="col-md-12 m-b-20">
                                <input name="img" type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect" >Save</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar User</h4>
                <h6 class="card-subtitle">Silahkan tambah user baru yang sesuai</h6>               
                <div class="table-responsive ">
                    <table id="tabel_akun" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Aksi</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Aksi</th>                                 
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($user)) {
                                $i = 1;
                                foreach ($user as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo substr($value->nama, 0, 10); ?></td>
                                        <td><?php echo substr($value->email, 0, 20); ?></td>
                                        <td><?php echo $value->no_telepon; ?></td>                                                                
                                        <td>                                        
                                            <a data-target="#edit_user<?php echo $value->id; ?>" data-toggle="modal" > <button type="button" class="btn btn-info btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
                                            <a onclick="act_del_user(<?php echo $value->id; ?>)" ><button type="button" class="btn btn-danger btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-toggle="modal" data-original-title="Hapus"><i class="ti-close" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>                        
                        </tbody>
                        <tfoot>
                        <button type="button" class="btn btn-info btn-rounded right-side-toggle" data-toggle="modal" data-target="#tambah_user">Tambah User</button>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="tambah_user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah User Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/tambah_user'); ?>" enctype="multipart/form-data" method="post" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Input Nama</label>
                            <div class="col-md-12 m-b-20">
                                <input type="text" name="nama_user" class="form-control" placeholder="Inputkan nama user">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input No Telepon</label>
                            <div class="col-md-12 m-b-20">
                                <input type="text" name="no_telp" class="form-control" placeholder="Inputkan nomor telepon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Email</label>
                            <div class="col-md-12 m-b-20">
                                <input type="text" name="email" class="form-control" placeholder="Inputkan email user">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Username</label>
                            <div class="col-md-12 m-b-20">
                                <input type="text" name="username" class="form-control" placeholder="Inputkan username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Password</label>
                            <div class="col-md-12 m-b-20">
                                <input type="password" name="password" class="form-control" placeholder="Inputkan password">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label>Input Ulang Password</label>
                            <div class="col-md-12 m-b-20">
                                <input type="password" name="cf_passwd" class="form-control" placeholder="Inputkan ulang password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Foto</label>
                            <div class="col-md-12 m-b-20">
                                <input type="file" name="img" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect">Save</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Banner</h4>
                <h6 class="card-subtitle">Silahkan tambah banner baru yang sesuai</h6>               
                <div class="table-responsive ">
                    <table id="tabel_banner" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Header</th>
                                <th>Isi Konten</th>
                                <th>Nama Tombol</th>
                                <th>Aksi</th>    
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Judul Header</th>
                                <th>Isi Konten</th>
                                <th>Nama Tombol</th>
                                <th>Aksi</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($banner)) {
                                $i = 1;
                                foreach ($banner as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $i; ?></td> 
                                        <td><?php echo $value->header; ?></td>
                                        <td><?php echo $value->konten; ?></td> 
                                        <td><?php echo $value->nama_tombol; ?></td> 
                                        <td>
                                            <a onclick="act_del_banner(<?php echo $value->id; ?>)" ><button type="button" class="btn btn-danger btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-toggle="modal" data-original-title="Hapus"><i class="ti-close" aria-hidden="true"></i></button></a>
                                            <a href="#edit_banner<?php echo $value->id; ?>" data-toggle="modal" > <button type="button" class="btn btn-info btn-sm btn-icon btn-pure btn-outline delete-row-btn " data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>                                                              
                        </tbody>
                        <tfoot>
                        <button type="button" class="btn btn-info btn-rounded right-side-toggle" data-toggle="modal" data-target="#tambah_banner">Tambah Banner Baru</button>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="tambah_banner" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Banner Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/tambah_banner'); ?>" enctype="multipart/form-data" method="post">
                    <div class="modal-body">                  
                        <div class="form-group">
                            <label>Input Header Banner</label>
                            <div class="col-md-12 m-b-20">
                                <input name="nama_header" type="text" class="form-control" placeholder="Inputkan header banner">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Nama Tombol</label>
                            <div class="col-md-12 m-b-20">
                                <input name="nama_tombol" type="text" class="form-control" placeholder="Inputkan nama tombol">
                            </div>
                        </div>        
                        <div class="form-group">
                            <label>Isi Konten</label>
                            <div class="col-md-12 m-b-20">
                                <textarea name="konten" class="form-control" rows="5" placeholder="Inputkan konten banner"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Foto Banner</label>
                            <div class="col-md-12 m-b-20">
                                <input name="img" type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect" >Save</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php
    if (!empty($user)) {
        foreach ($user as $key => $value) {
            ?>
            <div id="edit_user<?php echo $value->id; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/edit_user/' . $value->id); ?>" enctype="multipart/form-data" method="post" >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Input Nama</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" value="<?php echo $value->nama; ?>" name="nama_user" class="form-control" placeholder="Inputkan nama user">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Input No Telepon</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" value="<?php echo $value->no_telepon; ?>" name="no_telp" class="form-control" placeholder="Inputkan nomor telepon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Input Email</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" value="<?php echo $value->email; ?>" name="email" class="form-control" placeholder="Inputkan email user">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Input Username</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" value="<?php echo $value->username; ?>" name="username" class="form-control" placeholder="Inputkan username">
                                    </div>
                                </div>                               
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" name="image" value="<?php echo $value->foto; ?>" style="display:none" />
                                        <input type="text" name="image_thumb" value="<?php echo $value->foto_thumb; ?>" style="display:none" />
                                        <input type="file" name="img" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                                    </div>
                                    <?php if ($value->foto == true) {
                                        ?>
                                        <img width="100px" height="100px" src="<?php echo base_url() . $value->foto_thumb; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info waves-effect">Save</button>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <?php
        }
    }
    ?>	

    <?php
    if (!empty($kat)) {
        foreach ($kat as $key => $value) {
            ?>
            <div id="edit_kategori<?php echo $value->id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Tambah Kategori Baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/edit_kat/' . $value->id); ?>" enctype="multipart/form-data" method="post">
                            <div class="modal-body">                   
                                <div class="form-group">
                                    <label>Input Nama Kategori</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" name="nama_kat" value="<?php echo $value->nama_kat; ?>" class="form-control" placeholder="Inputkan nama kategori">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload Icom</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" name="image" value="<?php echo $value->icon; ?>" style="display:none" />
                                        <input type="text" name="image_thumb" value="<?php echo $value->icon_thumb; ?>" style="display:none" />
                                        <input name="img" type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                                    </div>
                                    <?php if ($value->icon == true) {
                                        ?>
                                        <img width="100px" height="100px" src="<?php echo base_url() . $value->icon_thumb; ?>">
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info waves-effect" >Save</button>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <?php
        }
    }
    ?>	

    <?php
    if (!empty($banner)) {
        foreach ($banner as $key => $value) {
            ?>
            <div id="edit_banner<?php echo $value->id; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Edit Banner</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal form-material" action="<?php echo site_url('pengaturan/edit_banner/' . $value->id); ?>" enctype="multipart/form-data" method="post">
                            <div class="modal-body">                  
                                <div class="form-group">
                                    <label>Input Header Banner</label>
                                    <div class="col-md-12 m-b-20">
                                        <input name="nama_header" value="<?php echo $value->header; ?>" type="text" class="form-control" placeholder="Inputkan header banner">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Input Nama Tombol</label>
                                    <div class="col-md-12 m-b-20">
                                        <input name="nama_tombol" value="<?php echo $value->nama_tombol; ?>" type="text" class="form-control" placeholder="Inputkan nama tombol">
                                    </div>
                                </div>        
                                <div class="form-group">
                                    <label>Isi Konten</label>
                                    <div class="col-md-12 m-b-20">
                                        <textarea name="konten" class="form-control" rows="5" placeholder="Inputkan konten banner"><?php echo $value->konten; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto Banner</label>
                                    <div class="col-md-12 m-b-20">
                                        <input type="text" name="image" value="<?php echo $value->foto; ?>" style="display:none" />
                                        <input type="text" name="image_thumb" value="<?php echo $value->foto_thumb; ?>" style="display:none" />
                                        <input name="img" type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                        <small class="form-control-feedback">*Gunakan Ukuran File Kurang Dari <b>2 MB</b> ! </small>
                                    </div>
                                    <?php if ($value->foto == true) {
                                        ?>
                                        <img width="100px" height="100px" src="<?php echo base_url() . $value->foto_thumb; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info waves-effect" >Save</button>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <?php
        }
    }
    ?>	
</div>

<script type="text/javascript">
    function act_del_user(object) {
        alertify.confirm("Apa anda yakin ingin menghapus data ini ?", function (e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>pengaturan/delete_user",
                    data: {id: object},
                    success: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[1]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[0]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
    }
    function act_del_banner(object) {
        alertify.confirm("Apa anda yakin ingin menghapus data ini ?", function (e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>pengaturan/delete_banner",
                    data: {id: object},
                    success: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[1]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[0]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
    }

    function act_del_kat(object) {
        alertify.confirm("Apa anda yakin ingin menghapus data ini ?", function (e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>pengaturan/delete_kat",
                    data: {id: object},
                    success: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[1]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[0]);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
    }
</script>