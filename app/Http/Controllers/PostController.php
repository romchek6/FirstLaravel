<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function index(){

        $posts = Post::all();

        return view('post.index' , compact('posts'));

    }

    public function create(){

        return view('post.create');

    }

    public function store(Request $request){

        if ($request->isMethod('post')) {

            $request->validate([
                'title'  => 'required',
                'content' => 'required',
                'img' => 'required'
            ]);

        }

        $data = $request->all();

        $path = Storage::put('/public' , $data['img']);

        $path = substr( $path  , 7 );

        $post = DB::table('posts')->where('slug' , $request->input('title'))->first();

        if($post === null){

            DB::table('posts')->insert(
                [
                    'title' =>  $data['title'],
                    'slug' => $data['title'],
                    'content' => $data['content'],
                    'img' =>$path,
                ]
            );

        }else{

            DB::table('posts')->insert(
                [
                    'title' =>  $data['title'],
                    'slug' => $data['title'] . '_'. time(),
                    'content' => $data['content'],
                    'img' => $path,
                ]
            );

        }

        return redirect()->route('post.index');

    }

    public function show(Post $post){

        return view('post.show' , compact('post'));

    }

    public function edit(Post $post){


        return view('post.edit' , compact('post'));

    }

    public function update(Request $request , Post $post){

        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        DB::table('posts')
            ->where('id', '=', $post->id)
            ->update(['title' => $request->title ,'content' => $request->text]);


        return redirect()->route('post.show' , $post->id);

    }

    public function destroy (Post $post){

        $post->delete();

        return redirect()->route('post.index');

    }

}
