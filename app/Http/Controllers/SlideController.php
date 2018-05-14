<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::paginate(10);
        return view('admin.slide.index', [
            'models' => $slides
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->all();

        $this->validate(request(), [
            'title' => 'required'
        ]);

        $slide = Slide::create($input);

        if (request()->file('image') == null) {
            $file = "";
        }else{
           $file = request()->file('image')->storeAs('slides', request()->file('image')->getClientOriginalName(), 'public_uploads');
        }
        $slide->update([
                'image' => $file
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        $model = $slide;
        return view('admin.slide.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Slide $slide)
    {
        $input = request()->all();

        $this->validate(request(), [
            'title' => 'required'
        ]);

        $slide->fill($input)->save();

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->storeAs('slides', request()->file('image')->getClientOriginalName(), 'public_uploads');
           $slide->update([
            'image' => $file
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('slide.index');
    }
}
