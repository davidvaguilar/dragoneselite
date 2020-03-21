<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\User;
use App\Post;

class TagsController extends Controller
{
    public function show(Tag $tag){

        //$tag = Tag::all();   //->users()->get();
        
        

        return view('pages.home', [
            'title' => "Publicaciones de la etiqueta '{$tag->name}'",
            'posts' => $tag->posts()->paginate(10)
        ]);
    }
}
