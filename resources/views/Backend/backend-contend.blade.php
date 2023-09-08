@extends('Backend.backend-master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
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
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      </div><!-- /.row -->



      <!--For interactive chart.......................... -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header" style="background: #17A2B8;">
            <h1 class="card-title" style="font-size:25px;">Dashboard</h1>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            {{-- <i class="fas fa-minus"></i> --}}
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            {{-- <i class="fas fa-times"></i> --}}
            </button>
            </div>
            </div>
            <div class="card-body">
            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 2510px;" width="627" height="62" class="chartjs-render-monitor"></canvas>
            </div>
          </div>
            </div>

          
      {{-- ......................................................................................... --}}
        </div><!-- /.col-lg-12 -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('scripts')
<script src="{{ asset('backend/plugins/flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('backend/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('backend/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
$(function () {
  /*
   * Flot Interactive Chart
   * -----------------------
   */
  // We use an inline data source in the example, usually data would
  // be fetched from a server
  var data        = [],
      totalPoints = 100

  function getRandomData() {

    if (data.length > 0) {
      data = data.slice(1)
    }

    // Do a random walk
    while (data.length < totalPoints) {

      var prev = data.length > 0 ? data[data.length - 1] : 50,
          y    = prev + Math.random() * 10 - 5

      if (y < 0) {
        y = 0
      } else if (y > 100) {
        y = 100
      }

      data.push(y)
    }

    // Zip the generated y values with the x values
    var res = []
    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]])
    }

    return res
  }

  var interactive_plot = $.plot('#interactive', [
      {
        data: getRandomData(),
      }
    ],
    {
      grid: {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor: '#f3f3f3'
      },
      series: {
        color: '#3c8dbc',
        lines: {
          lineWidth: 2,
          show: true,
          fill: true,
        },
      },
      yaxis: {
        min: 0,
        max: 100,
        show: true
      },
      xaxis: {
        show: true
      }
    }
  )

  var updateInterval = 500 //Fetch data ever x milliseconds
  var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
  function update() {

    interactive_plot.setData([getRandomData()])

    // Since the axes don't change, we don't need to call plot.setupGrid()
    interactive_plot.draw()
    if (realtime === 'on') {
      setTimeout(update, updateInterval)
    }
  }

  //INITIALIZE REALTIME DATA FETCHING
  if (realtime === 'on') {
    update()
  }
  //REALTIME TOGGLE
  $('#realtime .btn').click(function () {
    if ($(this).data('toggle') === 'on') {
      realtime = 'on'
    }
    else {
      realtime = 'off'
    }
    update()
  });

@endsection