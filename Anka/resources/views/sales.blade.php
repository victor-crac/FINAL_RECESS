
<html>
    <head>
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    </head>
    <body>
<h1>sales page</h1>
<div>
    <table id="participants_table">
        <tr>
        <td>Participant d</td>
        <td>Product ID</td>
        <td>GOODS_SOLD</td>
        {{-- <td>City Name</td>
        <td>Email</td> --}}
        </tr>
        @foreach ($sales as $p)
        <tr>

        <td>{{ $p['participant_id'] }}</td>
        <td>{{ $p ['product_id'] }}</td>
        <td>{{ $p ['goods_sold']}}</td>
       
        </tr>
        @endforeach
        </table>
    </div>
       <canvas id="myChart" width="400" height="100"></canvas>
       <script type="text/javascript">
        $(function () {
            $("#participants_table").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'], 
        // want to get data from a db and label as participants name..

        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>