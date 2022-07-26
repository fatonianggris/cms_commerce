<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Dashboard Toko</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Statistik Toko</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="f" class="linea-icon linea-basic"></i>
                                <h5 class="text-muted vb">TOTAL PRODUK</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger"><?php echo $jumlah[0]->total_produk; ?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->total_produk; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe013;"></i>
                                <h5 class="text-muted vb">REKOMENDASI</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-megna"><?php echo $jumlah[0]->rekomendasi; ?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->rekomendasi; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="H"></i>
                                <h5 class="text-muted vb">VISITOR HARI INI</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-primary"><?php echo $visits_today; ?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $visits_today; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="3"></i>
                                <h5 class="text-muted vb">USER ADMIN</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success"><?php echo $jumlah[0]->user_admin; ?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->user_admin; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <div class="row">
        <div class="col-md-12 col-lg-9 col-sm-12 col-xs-12 pull-right">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target=".modal-list-visitor" class="btn btn-info pull-right btn-sm btn-new-sm"><i class="fa fa-list m-r-5"></i>List Visitor</a>
                <h3 class="box-title">Statistik Visitor</h3>     
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Total Visitor</h5>
                    </li>                   
                </ul>
                <div id="morris-bar-chart" style="height: 388px;"></div>
                <div class="text-right">
                    <form id="select_month_year" method="post">
                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        <?php echo $this->site_config->generate_months() . '&nbsp;&nbsp;' . $this->site_config->generate_years(); ?>
                        <input type="button" class="btn btn-sm btn-warning" name="submit" id="chart_submit_btn" value="Get Data"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="white-box m-b-15">
                        <h3 class="box-title">Statistik Visitor</h3>
                        <div class="row">                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="sparkline2dash" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="white-box m-b-15">
                        <h3 class="box-title">VISIT STATASTICS</h3>
                        <div class="row">                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="morris-donut-chart" style="height: 200px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</div>
<div class="modal fade bs-example-modal-lg modal-list-visitor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Daftar Visitor Website</h4>
                <small>Tabel Berikut Merupakan Rekap Semua Visitor</small>
            </div>
            <div class="modal-body">           
                <div class="table-responsive">
                    <table id="pesanan" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>User Agent</th>
                                <th>Requested URL</th>
                                <th>Time Visit</th>                                                          
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>IP Address</th>
                                <th>User Agent</th>
                                <th>Requested URL</th>
                                <th>Time Visit</th>
                                <th class="clear-td">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($list_visitor)) {
                                foreach ($list_visitor as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><span class="label label-info"><?php echo $value->ip_address; ?></span></td>
                                        <?php
                                        $words = explode(" ", strtoupper($value->user_agent));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td><?php echo $value->requested_url; ?></td>                               
                                        <td><?php echo $value->access_date; ?></td>                               
                                        <td>
                                            <a onclick="act_delete_visitor(<?php echo $value->track_visitor_id; ?>, '<?php echo strtoupper($value->ip_address); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>    
                                    </tr>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--<div class="modal fade bs-example-modal-lg modal-visitor-hariini" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Satatistik Visitor Hari Ini</h4>
                <small>Berikut Merupakan Statistik Visitor Hari Ini</small>
            </div>
            <div class="modal-body">         
                <canvas id="chart2" height="150"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
            </div>
        </div>
         /.modal-content 
    </div>
     /.modal-dialog 
</div>
 /.modal -->
<script>

    function act_delete_visitor(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus IP visitor " + name + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("dashboard/delete_visitor") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "IP Visitor " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "IP Visitor " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<script>
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
<?php
if (!empty($chart_data_curr_month)) {
    foreach ($chart_data_curr_month as $key => $value) {
        ?>
                    {
                        period: '<?php echo $value->day; ?>',
                        Visitor: <?php echo $value->visits; ?>
                    },
        <?php
    }
}
?>
        ],
        xkey: 'period',
        ykeys: ['Visitor'],
        labels: ['Visitor'],
        barColors: ['#b8edf0'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
</script>
<script>
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
                label: "RECOMEND",
                value: <?php echo $jumlah[0]->rekomendasi; ?>,
            }, {
                label: "ALL PRODUCT",
                value: <?php echo $jumlah[0]->total_produk; ?>
            }, {
                label: "PROMO",
                value: <?php echo $jumlah[0]->promo; ?>
            }],
        resize: true,
        colors: ['#99d683', '#13dafe', '#6164c1']
    });

</script>
<script type="text/javascript">
    $("#chart_submit_btn").click(function (e) {
        // get the token value
        var cct = $("input[name=csrf_token_name]").val();
        //reset #container
        $('#morris-bar-chart').html('');
        $.ajax({
            url: "<?php echo site_url("dashboard/get_chart_data") ?>", //The url where the server req would we made.
            //async: false,
            type: "POST", //The type which you want to use: GET/POST
            data: $('#select_month_year').serialize(), //The variables which are going.
            dataType: "html", //Return data type (what we expect).
            csrf_token_name: cct,
            success: function (response) {
                if (response.toLowerCase().indexOf("no data found") >= 0) {
                    $('#morris-bar-chart').html(response);
                } else {
                    //build the chart
                    var tsv = response.split(/n/g);
                    var count = tsv.length - 1;
                    var my_array = [];
                    for (i = 0; i < count; i++) {
                        var line = tsv[i].split(/t/);
                        var line_data = line.toString().split(",");
                        var date = line_data[0];
                        var visits = line_data[1];
                        my_array.push({'period': date, 'SiteA': visits});
                    }

                    $(document).ready(function () {
                        Morris.Bar({
                            element: 'morris-bar-chart',
                            data: my_array,
                            xkey: 'period',
                            ykeys: ['SiteA'],
                            labels: ['Site A'],
                            barColors: ['#b8edf0'],
                            hideHover: 'auto',
                            gridLineColor: '#eef0f2',
                            resize: true
                        });
                    });
                }
            }
        });
    });
</script>
