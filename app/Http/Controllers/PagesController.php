<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        /* SE FUE A SCOPE
        $posts = Post::whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now() )
                ->latest('published_at')     //Ordenar desendennte
                ->get();  */        
            
        $posts = Post::published()->paginate();
        //$posts = Post::published()->simplePaginate(1);  //ANTERIOR y siguiente
        return view('pages.home', compact('posts')); 
    }

    public function about(){
        return view('pages.about');
    }


    public function archive(){
        return view('pages.archive');
    }

    public function contact(){
        return view('pages.contact');
    }
}
