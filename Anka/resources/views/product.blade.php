@foreach ($products as $products)
<div class="card-body">
  <h5 class="card-title">{{ $products['name'] }}</h5>
      <h6 class="card-subtitle mb-2 text-muted"></h6>
  <p class="card-text">{{ $products['Description'] }}</p>
     <a href="{{route('participants')}}" class="btn mr-2"><i class="fas fa-link"></i>PARTICIPANT</a>
  <a href="{{route('delivery')}}" class="btn "><i class="fab fa-github"></i>ORDER</a>
</div>
@endforeach

