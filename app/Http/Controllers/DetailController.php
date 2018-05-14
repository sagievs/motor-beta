<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;

class DetailController extends Controller
{
    public function getCreate(){
        return view('admin.detail.create');
    }
    public function postCreate(){
        $input = request()->all();
        $this->validate(request(), [
        	'key' => 'required',
        	'value' => 'required'
    	]);
        Detail::create($input);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('detail.index');
    }
    public function getEdit(Detail $detail){
        return view('admin.detail.edit', [
            'model' => $detail
        ]);
    }
    public function postEdit(Detail $detail) {
        $input = request()->all();
        $this->validate(request(), [
        	'key' => 'required',
        	'value' => 'required'
    	]);
        $detail->fill($input)->save();

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('detail.index');
    }
    public function getDelete(Detail $detail){
        $detail->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('detail.index');
    }
    public function getIndex(){
        $details = Detail::paginate(10);
        return view('admin.detail.index', [
            'models' => $details
        ]);
    }
}
