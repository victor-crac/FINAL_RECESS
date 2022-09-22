
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
    <table id="participants_table" border="1">
        <tr>
        <td>PARTICIPANT ID</td>
        <td>PRODUCT ID</td>
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
    @php
        $good_sold = [['name'=>'Red', 'num'=> 12],['name'=>'Blue', 'num'=> 9],['name'=>'Green', 'num'=> 3],['name'=>'Yellow', 'num'=> 5],['name'=>'Purple', 'num'=> 8],['name'=>'Orange', 'num'=> 11]];
        $goods = [];
        $sales = [];
        for ($i=0; $i<count($good_sold); $i++){
            $goods[] = $good_sold[$i]['name'];
            $sales[] = $good_sold[$i]['num'];
        }
    @endphp
<script>
const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: {!! json_encode($goods) !!}, 
        // want to get data from a db and label as participants name..

        datasets: [{
            label: '# of Votes',
            data: {!! json_encode($sales) !!},
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