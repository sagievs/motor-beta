<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Mail\OrderMail;
use App\Order;

class CartController extends Controller
{
    public function getAddToCartAjax()
    {
        $product = Product::where('id', request()->id)->first();
        if (!$product) return false;

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart', $cart);
        
        return response()->json(session()->get('cart')->totalQty);
    }

    public function getIndex()
    {
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;

        $totalPrice = $cart->totalPrice;
        return view('cart', compact('products', 'totalPrice'));
    }

    public function getCheckout()
    {
        if(!session()->has('cart'))
        {
            return back();
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        $products = $cart->items;

        return view('checkout', compact('products',  'totalPrice'));
    }

    public function postCheckout()
    {
        $siteemail = 'jumper_w@mail.ru';
        
        $input = request()->all();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'total' => 'required'
        ]);

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        $order = Order::create($input);
        $order->update([
            'products' => serialize($cart)
            ]);
        
        $products = unserialize($order->products);

        $subject = 'Заказ товара с сайта Motor-m.kz';
		$message = "Имя: ".$input['name']."\nТелефон: ".$input['phone']."\nE-mail: ".$input['email']."\nСпособ доставки: ".$input['delivery']."\nАдрес: ".$input['address']."\n Заказанные товары:\n";
		foreach($products->items as $product) {
		$message .= $product['item']['title']." * ".$product['qty'].", Цена - ".$product['item']['price']*$product['qty']."\n";
		}
		$message .= "\nИтого: ".$input['total']." тг\n";
		$headers = 'From: info@motor-m.kz' . "\r\n" .
            'Reply-To: info@motor-m.kz' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
		
		mail($siteemail, $subject, $message, $headers);

        request()->session()->forget('cart');
        
        session()->flash('flash_message', 'Спасибо, ваша заявка успешно отправлена!');

        return redirect()->route('cart');
    }

    public function getReduceByOne($id)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }

        return back();
    }

    public function getAddQty()
    {
        $input = request()->all();

        // return response()->json($input);
        
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->changeQty(request('id'), request('qty'));

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }

        return response()->json([
            'totalQty' => session()->get('cart')->totalQty,
            'totalPrice' => session()->get('cart')->totalPrice
        ]);

        // return back();
    }

    public function getRemoveItem($id)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }
        return back();
    }

    public function getAddToCart($id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) return false;

        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        request()->session()->put('cart', $cart);
        
        return back();
    }
}
