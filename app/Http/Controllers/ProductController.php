<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function getProduct(Category $category, Product $product)
    {
        if($product->category->id == $category->id)
        {   
            return view('product', compact('product'));
        }
        abort('404');
    }

    public function postAjaxFilter()
    {
        $count = false;
        
        $products = Product::where('category_id', request('id'))->active();

        if($types = request('types'))
        {
            $products->whereIn('type', $types);
        }
        if($countries = request('countries'))
        {
            $products->whereIn('country', $countries);
        }

        $products = $products->paginate(8);

        if($products->count() == 8)
        {
            $count = true;
        }
        
        $output = '';

        foreach($products as $product){
            $output .= '<div class="special-cont">
            <a href="/catalog">
                <img src="/images/'.$product->thumbnail.'"
                     alt="'.$product->title.'">
            </a>
            <p class="pr-desc">'.$product->title.'</p>
            <div class="price-wrap">
                <p>'.number_format($product->price, 0, ',', ' ').' тг</p>
            </div>
            <div id="img-product" class="cart-wrap rounded-circle atoc"
                 data-id="'.$product->id.'">
                <img class="align-middle loc-center"
                     src="/images/shopping-cart.svg" alt="корзина">
            </div>
        </div>';
        }

        // echo $output;
        return response()->json(['output' => $output, 'count' => $count]);
        // return response()->json($products->count());
    }

    public function getCreate(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }
    public function postCreate(){

        $input = request()->all();
        
        $this->validate(request(), [
            'title' => 'required'
            ]);

        $product = Product::create($input);

        if (request()->file('image') == null) {
            $file = "";
        }else{
           $file = request()->file('image')->storeAs('products', request()->file('image')->getClientOriginalName(), 'public_uploads');
        }
        $product->update([
                'image' => $file
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('product.index');
    }
    public function getEdit(Product $product){
        $categories = Category::all();
        return view('admin.product.edit', [
            'model' => $product,
            'categories' => $categories
        ]);
    }
    public function postEdit(Product $product){
        $input = request()->all();
        $this->validate(request(), [
            'title' => 'required'
        ]);

        $product->fill($input)->save();

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->storeAs('products', request()->file('image')->getClientOriginalName(), 'public_uploads');
           $product->update([
            'image' => $file
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('product.index');
    }
    public function getDelete(Product $product){
        $product->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('product.index');
    }
    public function getIndex(){
        $products = Product::paginate(10);
        return view('admin.product.index', [
            'models' => $products
        ]);
    }
    public function excel()
    {
        Excel::load(request()->file, function ($reader) {

            $result = $reader->get();
            
            $result = $reader->toObject();

            $message = '';
            $edited = 0;
            $created = 0;

            for($i = 0; $i<$result->count(); $i++)
            {
                $product = Product::where('id', $result[$i]->id)->first();
                if(!empty($product))
                {
                    //get files which don't changed
                    $product2 = Product::where('id', $result[$i]->id)
                    ->where('title', $result[$i]->title)
                    ->where('body', $result[$i]->body)
                    ->where('image', $result[$i]->image)
                    ->where('image1', $result[$i]->image1)
                    ->where('image2', $result[$i]->image2)
                    ->where('thumbnail', $result[$i]->thumbnail)
                    ->where('price', $result[$i]->price)
                    ->where('oldprice', $result[$i]->oldprice)
                    ->where('type', $result[$i]->type)
                    ->where('country', $result[$i]->country)
                    ->where('ismain', $result[$i]->ismain)
                    ->where('category_id', $result[$i]->category_id)
                    ->where('metatitle', $result[$i]->metatitle)
                    ->where('keywords', $result[$i]->keywords)
                    ->where('description', $result[$i]->description)
                    ->where('onsale', $result[$i]->onsale)
                    ->where('active', $result[$i]->active)
                    ->first();

                    if(empty($product2))
                    {
                        //update
                        $product->update([
                            'title' => $result[$i]->title,
                            'body' => $result[$i]->body,
                            'image' => $result[$i]->image,
                            'image1' => $result[$i]->image1,
                            'image2' => $result[$i]->image2,
                            'thumbnail' => $result[$i]->thumbnail,
                            'price' => $result[$i]->price,
                            'oldprice' => $result[$i]->oldprice,
                            'type' => $result[$i]->type,
                            'country' => $result[$i]->country,
                            'ismain' => $result[$i]->ismain,
                            'category_id' => $result[$i]->category_id,
                            'metatitle' => $result[$i]->metatitle,
                            'keywords' => $result[$i]->keywords,
                            'description' => $result[$i]->description,
                            'onsale' => $result[$i]->onsale,
                            'active' => $result[$i]->active
                        ]);

                        $edited++;
                        
                    }
                    else {
                        // dd('Изменении нет');
                        
                    }

                }
                else
                {
                    //create

                    $created++;

                    Product::create([
                        'title' => $result[$i]->title,
                            'body' => $result[$i]->body,
                            'image' => $result[$i]->image,
                            'image1' => $result[$i]->image1,
                            'image2' => $result[$i]->image2,
                            'thumbnail' => $result[$i]->thumbnail,
                            'price' => $result[$i]->price,
                            'oldprice' => $result[$i]->oldprice,
                            'type' => $result[$i]->type,
                            'country' => $result[$i]->country,
                            'ismain' => $result[$i]->ismain,
                            'category_id' => $result[$i]->category_id,
                            'metatitle' => $result[$i]->metatitle,
                            'keywords' => $result[$i]->keywords,
                            'description' => $result[$i]->description,
                            'onsale' => $result[$i]->onsale,
                            'active' => $result[$i]->active
                    ]);

                }
            }
            if($created == 0 && $edited == 0)
            {
                $message = 'Изменении нет!';
            }
            else {
                $message = 'Данные из Excel файла успешно импортированы! ';
                if($created != 0)
                {
                    $message .= 'Создано - '.$created.' ';
                }
                if($edited != 0)
                {
                    $message .= 'Изменено - '.$edited;
                }
            }

            $products = Product::count();
            if($result->count() < $products)
            {
                $products = Product::where('id', '>', $result->count());
                $count = $products->count();
                $products->delete();
                $message = 'Данные из Excel файла успешно импортированы! ';
                $message .= 'Удалено - '.$count;
            }

            session()->flash('flash_message', $message);
        });
        return redirect()->back();
    }
}
