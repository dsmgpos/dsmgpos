<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
require "lib/auth.php";
require "lib/index-lib.php";
checklogin();
$lib = new Library();
$tgl = date("Y-m-d");
$sbln = date("m");
$bln = $sbln;
$data = $lib->getbln($bln);
$dataset1 = array();
foreach ($data as $row) {
    $dataset1[] = array( $row['tgl'], $row['nota'] );
}
require "template/config.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $lib->counttrx($tgl)[0]; ?> Trx</h3>

                            <p>Jumlah Transaksi Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <a href="#" style="float:left;" class="bg-info small-box-footer col-xl-6">Add Transaksi <i
                                class="fas fa-arrow-circle-right"></i></a>
                        <a href="#" style="float:left;" class="bg-info small-box-footer col-xl-6">Laporan Transaksi <i
                                class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $lib->countbarang(); ?></h3>

                            <p>Jumlah Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer ">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $lib->countuser(); ?></h3>

                            <p>Jumlah Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $lib->countkategori(); ?></h3>

                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <p><?php
                                $data = $lib->getinfo();
                                //echo $data['isi'];
                                
                                ?>
                                <?php echo $_ENV["VERSION"]; ?></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <div class="card card-primary card-outline" width="75%">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Data Penjualan Bulan Ini
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" >
                    <div id="line-chart" style="height: 300px;width:95%;"></div>
                </div>
                <!-- /.card-body-->
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php
require "template/footer.php";
?>
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot-old/jquery.flot.pie.min.js"></script>
<script>
/*
 * LINE CHART
 * ----------
 */
var line_data1 = {
    data: <?php echo json_encode($dataset1, JSON_NUMERIC_CHECK); ?>,
    color : '#3c8dbc'
}
$.plot('#line-chart', [line_data1], {
    grid: {
        hoverable: true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor: '#f3f3f3'
    },
    series: {
        shadowSize: 0,
        lines: {
            show: true
        },
        points: {
            show: true
        }
    },
    lines: {
        fill: false,
        color: ['#3c8dbc', '#f56954']
    },
    yaxis: {
        show: true
    },
    xaxis: {
        show: true
    }
})
//Initialize tooltip on hover
$('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
    position: 'absolute',
    display: 'none',
    opacity: 0.8
}).appendTo('body')
$('#line-chart').bind('plothover', function(event, pos, item) {

    if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
            .css({
                top: item.pageY + 5,
                left: item.pageX + 5
            })
            .fadeIn(200)
    } else {
        $('#line-chart-tooltip').hide()
    }

})
/* END LINE CHART */
</script>