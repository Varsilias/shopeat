<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{

    /**
     * Move item from saved for later instance to shopping cart instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveForLater($id)
    {

        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        Cart::instance('default')->add([
            'id' => $item->id,
            'name' => $item->name,
            'qty' => $item->qty,
            'price' => $item->price,
            'options' => [
                'photo' => $item->photo,
                'details' => $item->details
            ]

        ]);
        // dd(Cart::content());
        return redirect()->route('cart')
            ->with('success', 'Item has been Moved to Cart!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Cart::instance('saveForLater')->remove($id);
        return back()->with('success', 'Item has been removed!');
    }
}
