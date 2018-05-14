<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
    public function postCreate()
    {
        $input = request()->all();
        $this->validate(request(), [
            'name' => 'required',
            'body' => 'required'
            ]);
        $feedback = Feedback::create($input);

        if(empty(request('avatar')))
        {
            $avas = ['def-avatar.jpg', 'def-avatar2.jpg', 'def-avatar3.jpg'];

            $feedback->update([
                'image' => $avas[array_rand($avas)]
                ]);
        }

        session()->flash('flash_message', 'Спасибо за ваш отзыв! Он будет опубликован после модерации');

        return redirect()->route('feedback');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10);
        return view('admin.feedback.index', [
            'models' => $feedbacks
        ]);
    }

    public function edit(Feedback $feedback)
    {
        $model = $feedback;
        return view('admin.feedback.edit', compact('model'));
    }

    public function update(Feedback $feedback)
    {
        $input = request()->all();

        $this->validate(request(), [
            'name' => 'required',
            'body' => 'required'
        ]);

        $feedback->fill($input)->save();

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->store('public/feedbacks');
           $feedback->update([
            'image' => $file
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('feedback.index');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('feedback.index');
    }
}
