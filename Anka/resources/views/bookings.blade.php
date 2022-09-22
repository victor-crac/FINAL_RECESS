@extends('layouts.app')
{{-- Renme this to Participant Table --}}
@section('content')
<!-- Main content -->
<section class="content-header">
  <div class="row">
    <div class="col-12">
      <div>
        <div class="card card-body">
          <h3 class="card-title">BOOKING LIST.</h3>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <p>Total number of participants: {{ $total ?? '' }}</p>
                    @if($total ?? ''>0)
                      <table id="patients_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Item</th>
                            <th>Pieces</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient['patientId'] }}</td>
                                <td>{{ $patient['patientName'] }}</td>
                                <td>{{ $patient['dateOfId'] }}</td>
                                <td>{{ $patient['gender'] }}</td>
                                <td>{{ $patient['category'] }}</td>
                                <td>{{ $patient['fullName'] }}</td>
                                <td>{{ $patient['hospitalName'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Id</th>
                            <th>Item</th>
                            <th>Pieces</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                          
                          </tr>
                          </tfoot>
                      </table>
                    <script type="text/javascript">
                        $(function () {
                            $("#patients_table").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                        });
                    </script>
                    @else
                      No data to display
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

