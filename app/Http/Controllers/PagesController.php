<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NewComment;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
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
            
        //$query = Post::published();

     

        $query = Post::with(['category', 'tags', 'owner', 'photos'])->published();

        /*$query = Tag::join('post_tag','tags.id','=','post_tag.post_id')
            ->join('tag_user','tags.id','=','tag_user.tag_id')
            ->join('posts','posts.id','=','post_tag.post_id')
            ->join('users','users.id','=','tag_user.user_id')
            ->where('users.id', '=',  auth()->id() )
            ->orderBy('posts.published_at', 'desc');*/


        //dd($query);


        if(request('month')){
            $query->whereMonth('published_at', request('month'));
        }
        if(request('year')){
            $query->whereYear('published_at', request('year'));
        }
        
        $posts = $query->paginate(1000);
        //$posts = Post::published()->paginate();
        //$posts = Post::published()->simplePaginate(1);  //ANTERIOR y siguiente
        return view('pages.home', compact('posts')); 
    }

    public function comment(Post $post, Request $request){
       // dd($request->comment);
        Mail::to('david.villegas.aguilar@gmail.com')->send(new NewComment($post, $request->comment));
        //return redirect('pages.home');
        return back();
    }

    public function about(){
        return view('pages.about');
    }
    
    public function archive(){
        
        //return Post::select('published_at')->groupBy('published_at')->get();
        /*$archive = Post::selectRaw('year(published_at) as year')
                ->selectRaw('month(published_at) as month')                  
                ->selectRaw('monthName(published_at) as monthname')                 
                ->selectRaw('count(*) posts')
                ->groupBy('year', 'month', 'monthname')         //  ->orderBy('published_at')
                ->get();*/
        $archive = Post::byYearAndMonth()->get();
                
        return view('pages.archive', [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archive' => $archive
        ]);
    }

    public function contact(){
        return view('pages.contact');
    }
}
