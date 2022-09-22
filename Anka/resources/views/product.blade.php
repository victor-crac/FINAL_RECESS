<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Products</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
                            </head>                             
        <body oncontextmenu='return false' class='snippet-body'>

          @php
          $a = [['id'=>2,'name'=>'soap' , 'Description'=>'Agood soap'],['id'=>3 , 'name'=>'pen' ,'Description'=>'A good pen']]    
          @endphp
      <div class="container">
  
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
           <h2 class="text-center">PRODUCTS</h2>
        </div>
        <div class="row m-0">
       
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>{{$a[0]['name']}}</span>
                            <p class="m-0 p-0">Women's Velvet Dress</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">$30</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Description</h5>
                            <span>{{$a[0]['Description']}}.</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                       
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-success w-100">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="row mt-3 p-0 text-center pro-box-section">
        </div>
    </div>
</div>
                    
   </body>
   <style>body {
    font-family: 'Roboto Condensed', sans-serif;
    background-color: #f5f5f5
}

.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.main-section {
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate(-50%, 5%);
}

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}</style>
   </html>
