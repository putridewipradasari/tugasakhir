<!DOCTYPE html>
<html>
<?php $this->load->view('head') ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('left') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $count_brng; ?></h3>

                <p>Jumlah Tamu Berkunjung Hari Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="<?php base_url() ?>Tamudt" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $count_pgw; ?></h3>

                <p>Jumlah Orang Didalam Kantor Utama</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php base_url() ?>Masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">CHART TAMU</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="lineChart" style="height: 250px; width: 584px;" width="525" height="224"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>


      </section>
      <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->
    <?php $this->load->view('footer')
    ?>


    <script>
      $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        // var areaChart = new Chart(areaChartCanvas)

        var areaChartData = {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          datasets: [
            // {
            //   label: 'Electronics',
            //   fillColor: 'rgba(210, 214, 222, 1)',
            //   strokeColor: 'rgba(210, 214, 222, 1)',
            //   pointColor: 'rgba(210, 214, 222, 1)',
            //   pointStrokeColor: '#c1c7d1',
            //   pointHighlightFill: '#fff',
            //   pointHighlightStroke: 'rgba(220,220,220,1)',
            //   data: [65, 59, 80, 81, 56, 55, 40]
            // },
            {
              label: 'Digital Goods',
              fillColor: 'rgba(60,141,188,0.9)',
              strokeColor: 'rgba(60,141,188,0.8)',
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              // data: [28, 48, 40, 19, 86, 27, 90]
              data: <?php echo json_encode($grafik); ?>
            }
          ]
        }

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        }

        //Create the line chart
        // areaChart.Line(areaChartData, areaChartOptions)

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChart = new Chart(lineChartCanvas)
        var lineChartOptions = areaChartOptions
        lineChartOptions.datasetFill = false
        lineChart.Line(areaChartData, lineChartOptions)
      })
    </script>
</body>

</html>