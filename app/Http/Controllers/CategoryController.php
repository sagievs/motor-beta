<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function getCategory(Category $category) {

        if(count($category->children))
        {

            $categories = Category::active()->where('parent_id', $category->id)->paginate(9);
            
            return view('category', compact('category', 'categories'));
        }
        else {
            $products = Product::active()->where('category_id', $category->id)->paginate(9);

            return view('category', compact('category', 'products'));
        }

    }

    public function getCreate(){
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    public function postCreate(Request $request){

        $input = request()->all();
        
        $this->validate(request(), [
            'title' => 'required'
            ]);

        $category = Category::create($input);

        $category->update([
            'slug' => str2url($category->title)
            ]);

        if (request()->file('image') == null) {
            $file = "";
        }else{
           $file = request()->file('image')->storeAs('categories', request()->file('image')->getClientOriginalName(), 'public_uploads');
        }
        $category->update([
                'image' => $file
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('category.index');
    }
    public function getEdit(Category $category){
        $model = $category;
        $categories = Category::all();
        return view('admin.category.edit', compact('categories', 'model'));
    }
    public function postEdit(Category $category, Request $request){
        $input = $request->all();
        $this->validate(request(), [
            'title' => 'required'
        ]);

        $category->fill($input)->save();

        $category->update([
            'slug' => str2url($category->title)
            ]);

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->storeAs('categories', request()->file('image')->getClientOriginalName(), 'public_uploads');
        //    Image::make(request()->file('image'))->resize(254, 190)->save('storage/posts/'.request()->file('image')->getClientOriginalName());
           $category->update([
            'image' => $file
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('category.index');
    }
    public function getDelete(Category $category){
        $category->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('category.index');
    }
    public function getIndex(){
        $categories = Category::paginate(10);
        return view('admin.category.index', [
            'models' => $categories
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
                $category = Category::where('id', $result[$i]->id)->first();
                if(!empty($category))
                {
                    //get files which don't changed
                    $category2 = Category::where('id', $result[$i]->id)
                    ->where('slug', $result[$i]->slug)
                    ->where('title', $result[$i]->title)
                    ->where('parent_id', $result[$i]->parent_id)
                    ->where('icon', $result[$i]->icon)
                    ->where('image', $result[$i]->image)
                    ->where('active', $result[$i]->active)
                    ->first();

                    if(empty($category2))
                    {
                        //update
                        $category->update([
                        'title' => $result[$i]->title,
                        'slug' => $result[$i]->slug,
                        'parent_id' => $result[$i]->parent_id,
                        'icon' => $result[$i]->icon,
                        'image' => $result[$i]->image,
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

                    Category::create([
                        'title' => $result[$i]->title,
                        'slug' => $result[$i]->slug,
                        'parent_id' => $result[$i]->parent_id,
                        'icon' => $result[$i]->icon,
                        'image' => $result[$i]->image,
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

            $categories = Category::count();
            if($result->count() < $categories)
            {
                $categories = Category::where('id', '>', $result->count());
                $count = $categories->count();
                $categories->delete();
                /* $deleted = 0;
                $categories = Category::all();
                foreach($categories as $cat)
                {
                    if($result[$i]->slug != $cat->slug)
                    {
                        $cat->delete();
                        $deleted++;
                    }
                } */
                $message = 'Данные из Excel файла успешно импортированы! ';
                $message .= 'Удалено - '.$count;
            }

            session()->flash('flash_message', $message);
        });
        return redirect()->back();
    }
}
