<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function getCreate(){
        return view('admin.post.create');
    }
    public function postCreate(){

        $input = request()->all();
        
        $this->validate(request(), [
            'title' => 'required'
            ]);

        $post = Post::create($input);

        if (request()->file('image') == null) {
            $file = "";
        }else{
           $file = request()->file('image')->storeAs('posts', request()->file('image')->getClientOriginalName(), 'public_uploads');
           $thumbnail = 'posts/thumb/'.request()->file('image')->getClientOriginalName();
           Image::make(request()->file('image'))->resize(254, 190)->save('storage/posts/thumb/'.request()->file('image')->getClientOriginalName());
        }
        $post->update([
                'image' => $file,
                'thumbnail' => $thumbnail
                ]);

        session()->flash('flash_message', 'Запись успешно добавлена!');

        return redirect()->route('post.index');
    }
    public function getEdit(Post $post){
        return view('admin.post.edit', [
            'model' => $post
        ]);
    }
    public function postEdit(Post $post){

        $input = request()->except(['ismainCb']);

        $this->validate(request(), [
            'title' => 'required'
        ]);

        $post->fill($input)->save();

        if (request()->file('image') != null) 
        {
           $file = request()->file('image')->storeAs('posts', request()->file('image')->getClientOriginalName(), 'public_uploads');
           $thumbnail = 'posts/thumb/'.request()->file('image')->getClientOriginalName();
           Image::make(request()->file('image'))->resize(254, 190)->save('storage/posts/thumb/'.request()->file('image')->getClientOriginalName());
           $post->update([
            'image' => $file,
            'thumbnail' => $thumbnail
            ]);
        }

        session()->flash('flash_message', 'Запись успешно изменена!');

        return redirect()->route('post.index');
    }
    public function getDelete(Post $post){
        $post->delete();

        session()->flash('flash_message', 'Запись успешно удалена!');

        return redirect()->route('post.index');
    }
    public function getIndex(){
        $posts = Post::paginate(10);
        return view('admin.post.index', [
            'models' => $posts
        ]);
    }
}
