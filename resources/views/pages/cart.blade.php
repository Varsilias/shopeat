@extends('layouts.app')

@section('content')
<div class="pb-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            @if (Cart::instance('default')->count() > 0)
            <div class="bg-white px-4 py-3 mb-3 font-weight-bold">Shopping Cart</div>
          <!-- Shopping cart table -->
          <div class="table-responsive">

            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3">Product(s) <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span></div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 ">Unit Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 ">Total Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 ">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach (Cart::instance('default')->content() as $item)
                  <th scope="row" class="border-0">
                    <div class="p-2">
                        <img src="{{$item->options->photo}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="/product/{{$item->name}}" class="text-dark d-inline-block align-middle">{{$item->name}}</a></h5>
                        <form action="{{ route('cart.saveForLater', $item->rowId) }}" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-white">Save for Later</button>
                        </form>
                        {{-- <span>Save for Later</span> --}}
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>{{$item->price}}</strong></td>
                  <td class="border-0 align-middle"><strong>{{$item->price * $item->qty}}</strong></td>
                  <td class="border-0 align-middle"><strong>{{$item->qty}}</strong></td>
                    <form action="{{route('cart.destroy', $item->rowId)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <td class="border-0 align-middle">
                        <button class="border-0" type="submit"><i class="fa fa-trash"></i></button>
                        </td>
                    </form>
                  {{-- <td class="border-0 align-middle">
                      <a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                    </td> --}}
                </tr>
                @endforeach
                {{-- end here --}}
              </tbody>
            </table>
          </div>

          @else

          <h3>No Item(s) in Cart!</h3>
          <h5>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Start Shopping</a>
          </h5>
          @endif

          <!-- End -->
        </div>
      </div>
      {{-- Save for Later Table --}}
      <div class="row p-5 bg-white rounded shadow-sm mb-5">
          @if (Cart::instance('saveForLater')->count() > 0)
          <div class="bg-white px-4 py-3 mb-3 font-weight-bold"> {{Cart::instance('saveForLater')->count()}} Item(s) Saved for later</div>
          <div class="table-responsive">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3">Product(s) <span class="badge badge-secondary badge-pill">{{Cart::instance('saveForLater')->count()}}</span></div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 ">Unit Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 ">Total Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 ">Remove</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      @foreach (Cart::instance('saveForLater')->content() as $item)
                    <th scope="row" class="border-0">
                      <div class="p-2">
                          <img src="{{$item->options->photo}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="/product/{{$item->name}}" class="text-dark d-inline-block align-middle">{{$item->name}}</a></h5>
                          <form action="{{ route('wishlist.saveForLater', $item->rowId) }}" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-white">Move to Cart</button>
                        </form>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{$item->price}}</strong></td>
                    <td class="border-0 align-middle"><strong>{{$item->price * $item->qty}}</strong></td>
                    <td class="border-0 align-middle"><strong>{{$item->qty}}</strong></td>
                      <form action="{{route('wishlist.destroy', $item->rowId)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <td class="border-0 align-middle">
                          <button class="border-0" type="submit"><i class="fa fa-trash"></i></button>
                          </td>
                      </form>
                    {{-- <td class="border-0 align-middle">
                        <a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                      </td> --}}
                  </tr>
                  @endforeach
                  {{-- end here --}}
                </tbody>
              </table>
            </div>
            @else
            <h3>You have no Item(s) Saved For Later.</h3>

          @endif
        </div>

{{-- end seve for later --}}

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        @if (Cart::instance('default')->count() > 0)
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>${{Cart::subtotal() ? Cart::subtotal() : '0.00'}}</strong></li>
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>${{ Cart::subtotal() * 10 / 100 ? Cart::subtotal() * 10 / 100 : '0.00' }}</strong></li>
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax(7.5%)</strong><strong>${{Cart::tax() ? Cart::tax() : '0.00'}}</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
              <h5 class="font-weight-bold">${{Cart::total() + Cart::subtotal() * 10 / 100 ? Cart::total() + Cart::subtotal() * 10 / 100:'0.00' }}</h5>
              </li>
            </ul>
            <a href="{{ route('home') }}" class="btn btn-outline-dark py-2 btn-block">
                Continue Shopping
            </a>
            <a href="{{ route('checkout.index') }}" class="btn btn-dark py-2 btn-block">
                Proceed to checkout
            </a>
          </div>
          @endif

        </div>
      </div>
      @section('footer')
      @include('includes.footer')
      @endsection
    </div>
  </div>

@endsection
