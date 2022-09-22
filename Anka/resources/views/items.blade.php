<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ANKA BUSINESS SUPPORT SERVICES</title>

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chart.js/Chart.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

</head>
<body>
    <section class="content-header">
      <div class="row">
        <div class="col-12">
          <div>
            <div class="card card-body">
              <h3 class="card-title">Participant list and total.</h3>
            </div>
            <div class="content">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="participants_table" class="table-bordered table-striped">
                            <tr>
                            <td>Participant d</td>
                            <td>Product ID</td>
                            <td>GOODS_SOLD</td>
                       
                            </tr>
                            @foreach ($sales as $p)
                            <tr>
                    
                            <td>{{ $p['participant_id'] }}</td>
                            <td>{{ $p ['product_id'] }}</td>
                            <td>{{ $p ['goods_sold']}}</td>
                           
                            </tr>
                            @endforeach
                            </table>
                        <script type="text/javascript">
                            $(function () {
                                $("#participants_table").DataTable({
                                    "responsive": true,
                                    "autoWidth": false,
                                });
                            });
                        </script>
        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
    </div>