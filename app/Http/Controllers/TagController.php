<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){

        $tags = Tag::all();

        return view('tag.index' , compact('tags'));

    }

    public function create(){

        return view('tag.create');

    }

    public function store(Request $request){

        if ($request->isMethod('post')) {

            $request->validate([
                'title'  => 'required',
            ]);

        }

        $data = $request->all();

        $tag = DB::table('tags')->where('slug' , $request->input('title'))->first();

        if($tag=== null){

            DB::table('tags')->insert(
                [
                    'title' =>  $data['title'],
                    'slug' => $data['title'],
                ]
            );

        }else{

            DB::table('tags')->insert(
                [
                    'title' =>  $data['title'],
                    'slug' => $data['title'] . '_'. time(),

                ]
            );

        }

        return redirect()->route('tag.index');

    }

    public function show(Tag $tag){

        return view('tag.show' , compact('tag'));

    }

    public function edit(Tag $tag){


        return view('tag.edit' , compact('tag'));

    }

    public function update(Request $request ,Tag $tag){

        $request->validate([
            'title' => 'required',
        ]);

        DB::table('tags')
            ->where('id', '=', $tag->id)
            ->update(['title' => $request->title]);


        return redirect()->route('tag.show' , $tag->id);

    }

    public function destroy (Tag $tag){

        $id = $tag->id;

        $tag->delete();

        return redirect()->route('tag.index');

    }
}
