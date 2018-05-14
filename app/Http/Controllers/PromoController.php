<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use Intervention\Image\Facades\Image;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Action::paginate(10);
        return view('admin.promo.index', [
            'models' => $promos
        ]);
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store()
    {
        $input = request()->all();

        $this->validate(request(), [
            'title' => 'required'
        ]);

        $promo = Action::create($input);

        if (!request()->file('image') == null && !request()->file('thumbnail') == null) {
            $imagefile = request()->file('image')->store('public/promos');
            $thumbnailfile = request()->file('thumbnail')->store('public/promos/thumbnail');
        }
        else if (!request()->file('thumbnail') == null && request()->file('image') == null) {
            $thumbnailfile = request()->file('thumbnail')->store('public/promos/thumbnail');
            $imagefile = "";
        }
        else if (request()->file('thumbnail') == null && !request()->file('image') == null) {
            $imagefile = request()->file('image')->store('public/promos');
            $thumbnailfile = "";
        }
        else{
           $imagefile = "";
           $thumbnailfile = "";
        }
        $promo->update([
                'image' => $imagefile,
                'thumbnail' => $thumbnailfile
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('promo.index');
    }

    public function edit(Action $action)
    {
        $model = $action;
        return view('admin.promo.edit', compact('model'));
    }

    public function update(Action $action)
    {
        $input = request()->all();

        $this->validate(request(), [
            'title' => 'required'
        ]);

        $action->fill($input)->save();

        if (!request()->file('image') == null && !request()->file('thumbnail') == null) {
            $imagefile = request()->file('image')->store('public/promos');
            $thumbnailfile = request()->file('thumbnail')->store('public/promos/thumbnail');
            $action->update([
                'image' => $imagefile,
                'thumbnail' => $thumbnailfile
                ]);
        }
        else if (!request()->file('thumbnail') == null && request()->file('image') == null) {
            $thumbnailfile = request()->file('thumbnail')->store('public/promos/thumbnail');
            $action->update([
                'thumbnail' => $thumbnailfile
                ]);
        }
        else if (request()->file('thumbnail') == null && !request()->file('image') == null) {
            $imagefile = request()->file('image')->store('public/promos');
            $action->update([
                'image' => $imagefile
                ]);
        }
        else{
           $imagefile = "";
           $thumbnailfile = "";
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('promo.index');
    }

    public function destroy(Action $action)
    {
        $action->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('promo.index');
    }
}
