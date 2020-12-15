@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            @if (Cart::instance('default')->count())
            <span class="text-muted">Your Order</span>
          <span class="badge badge-secondary badge-pill">{{Cart::instance('default')->count()}}</span>
          @else
            <h3>You have no Item(s) in Cart.</h3>
          @endif
        </h4>
        <ul class="list-group mb-3">
            @foreach (Cart::instance('default')->content() as $item)

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 font-weight-bold">{{$item->name}}</h6>
              <small class="text-muted">{{$item->options->details}}</small>
            </div>
            <span class="text-muted">${{$item->price}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Subtotal</span>
            <strong>${{Cart::subtotal() ? Cart::subtotal() : '0.00'}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Shipping and handling</span>
            <strong>${{ Cart::subtotal() * 10 / 100 ? Cart::subtotal() * 10 / 100 : '0.00' }}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tax(7.5%)</span>
            <strong>${{Cart::tax() ? Cart::tax() : '0.00'}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span class="font-weight-bold">Total (USD)</span>
            <strong>${{Cart::total() + Cart::subtotal() * 10 / 100 ? Cart::total() + Cart::subtotal() * 10 / 100:'0.00' }}</strong>
          </li>
          @endforeach
        </ul>
        <!-- Your cart section ends here-->
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form action="{{route('pay')}}" accept-charset="UTF-8" method="POST" id="pay">
            @csrf
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="name">Full name</label>
              <input type="text" class="form-control" name="full_name" id="full_name" placeholder="" value="{{Auth::user()->name}}" >
              <div class="invalid-feedback">
                Valid first name is .
              </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="phoneNumber">Phone No</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid phoneNumber is .
                </div>
              </div>

          <div class="col-md-12 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email" id="email" placeholder="you@example.com" value="{{Auth::user()->email}}">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" >
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <label for="address">Address 2</label>
            <input type="text" class="form-control" name="address2" id="address2" placeholder="1234 another Main St" >
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City">
          </div>

            <div class="col-md-12 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" name="country" id="country" >
                {{-- <option value="">Choose...</option> --}}
                <option value="Nigeria">Nigeria</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" name="state" id="state" >
                <option value="">Choose...</option>
                <option value="Lagos">Lagos</option>
                <option value="Abuja">Abuja</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Abia">Abia</option>

              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="zip">ZipCode</label>
              <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="" >
              <div class="invalid-feedback">
                Zip code .
              </div>
            </div>

          <hr class="mb-4">
            {{-- <input type="hidden" name="orderID" value="1"> --}}
          <input type="hidden" name="email" value="danielokoronkwo90@gmail.com"> {{-- required --}}
          <input type="hidden" name="amount" id="amount" value="{{(Cart::total() + Cart::subtotal() * 10 / 100) * 381 * 100 }}"> {{-- required in kobo --}}
          <input type="hidden" name="quantity" value="{{Cart::instance('default')->count()}}">
          <input type="hidden" name="currency" value="NGN">
          <input type="hidden" name="metadata[]" id="metadata">
          {{-- For other necessary things you want to add to your payload. it is optional though --}}
          <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}" id="reference"> {{-- required --}}

          <hr class="mb-4">
          <div class="col-md-12 mb-3">
            <button class="btn btn-dark btn-lg btn-block mb-5" type="submit" >Complete Order</button>
          </div>
        </form>
      </div>
    </div>
</div>
  @section('footer')
  @include('includes.footer')
  @endsection
@endsection
