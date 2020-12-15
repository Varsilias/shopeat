<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaymentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);
        Cart::instance('default')->destroy();
        return view('pages.thankyou')->with('success', 'Your Purchase was successful');
    }
}
