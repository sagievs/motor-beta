<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartAjaxController extends Controller
{
    public function getAjaxAddToCart()
    {
        // return response()->json(request('id'));
        $id = request('id');
        $product = Product::where('id', $id)->first();
        if (!$product) return false;

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart', $cart);
        
        return response()->json([
            'totalQty' => session()->get('cart')->totalQty,
            'totalPrice' => session()->get('cart')->totalPrice
        ]);
    }

    public function getAjaxReduceByOne()
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne(request('id'));

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }

        return response()->json([
            'totalQty' => session()->get('cart')->totalQty,
            'totalPrice' => session()->get('cart')->totalPrice
        ]);  
    }

    public function getAjaxRemoveItem()
    {
        $id = request('id');
        // return response()->json($id);
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }
        if(session()->has('cart'))
        {
            return response()->json([
                'totalQty' => session()->get('cart')->totalQty,
                'totalPrice' => session()->get('cart')->totalPrice
            ]);
        }
        else {
            return response()->json([
                'totalQty' => 0,
                'totalPrice' => 0
            ]);
        }
    }

    public function getAjaxAddQty()
    {
        $input = request()->all();

        $product = Product::where('id', request('id'))->first();

        // return response()->json($input);
        
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->AddChangeQty($product, request('id'), request('qty'));

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }

        return response()->json([
            'totalQty' => session()->get('cart')->totalQty
        ]);

        // return back();
    }
}
