@extends('layouts.admin')

@section('header', 'Dashbord')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_buku }}</h3>
                    <p>Total Buku</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            <a href="{{ url('books') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_anggota }}</h3>
                    <p>Total Anggota</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            <a href="{{ url('members') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_penerbit }}</h3>
                    <p>Data Penerbit</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            <a href="{{ url('publishers') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_pengarang }}</h3>
                    <p>Data Pengarang</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            <a href="{{ url('authors') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_katalog }}</h3>
                    <p>Data Catalog</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            <a href="{{ url('catalogs') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Donut Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 824px;" width="549" height="166" class="chartjs-render-monitor"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Bar Chart</h3>  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('js')
<script type="text/javascript">
    var label_donut = '{!! json_encode($label_donut) !!}';
    var data_donut = '{!! json_encode($data_donut) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';
 
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
  
      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: JSON.parse(label_donut),
        datasets: [
          {
            data: JSON.parse(data_donut),
            backgroundColor: generateRandomColors(JSON.parse(data_donut).length),
          }
        ],
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      function generateRandomColor() {
        return '#' + ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
        }

        function generateRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            colors.push(generateRandomColor());
        }
        return colors;
        }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
      //-------------
      //- BAR CHART -
      //-------------

      var areaChartData = {
        labels: ['January', 'February','march','April','May','June','July','Agustus','September','October','November','Desember'],
        datasets: JSON.parse(data_bar),
      }
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
    //   var temp0 = areaChartData.datasets[0]
    //   var temp1 = areaChartData.datasets[1]
    //   barChartData.datasets[0] = temp1
    //   barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    })
</script>
@endsection