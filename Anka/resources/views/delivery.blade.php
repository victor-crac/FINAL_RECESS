<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>BOOK PRODUCT</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('deliver') }}" method="POST">
                        @csrf
                            <div class="form-group">
                              <label for="location">Delivery Location</label>
                              <input type="text" class="form-control" id="location">
                            </div>
                            <div class="form-group">
                              <label for="Qty">Quantity of Item:</label>
                              <input type="number" class="form-control" id="Qty">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                          </form>

                </div>
            </div>
        </div>
    </div>
</div>