<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show'
        ]);
    }

    /**
     * Show the application HomePage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::take(9)->get();
        return view('home')->with('products', $products);
    }

    /**
     *  Show the Product details
     *
     *
     */
    public function show($name)
    {
        $product = Product::where('name', $name)->firstOrFail();
        $products = array($product);
        $reviews = $product->reviews()->get();
        $suggested = Product::take(12)->orderBy('name', 'desc')->get();
        // Function to calculate rating based on the value of rating and number of reviews returned
        function getRating($reviews){
            if (count($reviews) > 0) {
                foreach ($reviews as $review => $item) {
                    $total = array($item->rating);
                    $rating = round(array_sum($total)/count($reviews), 2);
                    if($rating === 0) {
                        return 'No rating yet';
                    } else {
                        return $rating;
                    }
                }
            }
        }
        $rating = getRating($reviews);
        return view('pages.showdetails')
            ->with('products', $products)
            ->with('reviews', $reviews)
            ->with('rating', $rating)
            ->with('suggested', $suggested);
    }
}
