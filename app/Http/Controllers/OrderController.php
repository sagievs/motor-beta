<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    
    public function index()
    {
        $models = Order::latest()->paginate(10);
        return view('admin.order.index', compact('models'));
    }

    public function edit(Order $order)
    {
        $model = $order;

        $products = unserialize($order->products);

        return view('admin.order.edit', compact('model', 'products'));
    }

    public function update(Order $order)
    {
        $input = request()->all();
        $this->validate(request(), [
        	'name' => 'required',
        	'total' => 'required'
    	]);
        $order->fill($input)->save();

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('order.index');
    }

}
