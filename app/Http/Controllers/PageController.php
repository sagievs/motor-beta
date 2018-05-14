<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Intervention\Image\Facades\Image;


class PageController extends Controller
{
    public function getCreate(){
        return view('admin.page.create');
    }
    public function postCreate(){

        $input = request()->all();;
        
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required'
            ]);

        $page = Page::create($input);

        if (request()->file('image') == null) {
            $file = "";
        }else{
           $file = request()->file('image')->storeAs('pages', request()->file('image')->getClientOriginalName(), 'public_uploads');
        //    Image::make(request()->file('image'))->resize(300, 200)->save('storage/pages/'.request()->file('image')->getClientOriginalName());
        }
        $page->update([
                'image' => $file
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('page.index');
    }
    public function getEdit(Page $page){
        return view('admin.page.edit', [
            'model' => $page
        ]);
    }
    public function postEdit(Page $page){

        $input = request()->except(['ismainCb']);

        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required'
        ]);

        $page->fill($input)->save();

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->storeAs('pages', request()->file('image')->getClientOriginalName(), 'public_uploads');
           $page->update([
            'image' => $file
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('page.index');
    }
    public function getDelete(Page $page){
        $page->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('page.index');
    }
    public function getIndex(){
        $pages = Page::paginate(10);
        return view('admin.page.index', [
            'models' => $pages
        ]);
    }
}
