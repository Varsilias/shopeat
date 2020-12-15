@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12" id="carousel-wrapper">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{asset('img/cart-image.jpeg')}}" alt="First slide" width="1300" height="500">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('img/ecom.jpg')}}" alt="Second slide" width="1300" height="500">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('img/phone-ecommerce.jpeg')}}" alt="Third slide" width="1300" height="500">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
    {{--  carousel ends--}}
</div>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <h3>Products</h3>
        </div>
        @if (count($products) > 0)
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/product/{{$product->name}}"><img class="card-img-top" src="{{$product->photo}}" alt="Product Image"></a>
              <div class="card-body">
                <h4 class="card-title">
                    <a href="/product/{{$product->name}}">{{$product->name}}</a>
                </h4>
                <h5>${{$product->price}}</h5>
                <p class="card-text">{{$product->details}}</p>
              </div>
              <div class="card-footer">
                  <a href="/product/{{$product->name}}" class="btn btn-outline-success">Show details</a>
              </div>
            </div>
          </div>
        @endforeach
        @endif
    </div>
</div>
{{-- Products section ends here --}}
@endsection
@section('footer')
    @include('includes.footer')
@endsection
