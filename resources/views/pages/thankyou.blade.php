@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Your purchase have been recieved successfully, we would send you an invoice via email.</p>
     <hr>
    <p>
      Having trouble? <a href="mailto:danielokoronkwo90@gmail.com">Contact us</a>
    </p>
    <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Continue Shopping</a>
    </p>
  </div>
@endsection
