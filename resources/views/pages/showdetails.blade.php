@extends('layouts.app')
@section('content')
<div class="container  mt-3">
    <div class="row align-item-center justify-content-center">
        <div class="col-md-12 col-sm-12">
            <span class="text-left bg-default">
                <a href="{{route('home')}}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </span>
        </div>
    </div>

</div>
    <div class="container mt-4">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div class="row ">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <img class="card-img-top" src="{{$product->photo}}" alt="">
                        </div>
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <div class="card-body">
                                <h4 class="card-title text-primary">{{$product->name}}</h4>
                                <p class="card-text">{{$product->details}}</p>
                                <h5 class="text-secondary">${{$product->price}}</h5>
                              </div>
                              <div class="card-body">
                                  <span>{{$rating}} rating</span
                                <small class="text-muted">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </small>
                                <br><br>
                                <form action="{{ route('cart.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->name}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="hidden" name="photo" value="{{$product->photo}}">
                                    <input type="hidden" name="details" value="{{$product->details}}">
                                    <button type="submit" class="btn btn-outline-success">Add to Cart</button>
                                </form>
                                {{-- <a href="#" class="btn btn-outline-success">Add to Cart</a> --}}
                              </div>
                        </div>
                </div>
            </div>
            @endforeach
            @endif

{{-- selected product detail ends here --}}

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <h3>Customer Feedback</h3>
            <hr>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-sm-12">
                <h5>Product Reviews</h5>
            </div>
            @foreach ($reviews as $review => $item)
            <div class="col-md-4 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title">
                      {{$item->customer}}
                    </h4>
                    <h5>{{$item ->created_at->format('Y-m-d')}}</h5>
                    <p class="card-text">
                        {{$item->review}}
                    </p>
                  </div>
            </div>
            @endforeach

{{-- Selected product reviews ends here --}}

<div class="container my-4">
    <div class="row my-4">
        <div class="col-md-12">
            <h3>Suggested Products under this category</h3>
        </div>
        @if (count($suggested) > 0)
        @foreach ($suggested as $product)
        <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
              <a href="/product/{{$product->name}}"><img class="card-img-top" src="{{$product->photo}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                    <a href="/product/{{$product->name}}">{{$product->name}}</a>
                </h4>
                <h5 class="text-secondary">${{$product->price}}</h5>
                <p class="card-text">{{$product->details}}</p>
              </div>
            </div>
          </div>
        @endforeach
        @endif
</div>
@endsection
@section('footer')
    @include('includes.footer')
@endsection
