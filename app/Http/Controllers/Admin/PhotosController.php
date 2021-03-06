<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post){
        //return 'procesando imagen...';
        //return request()->all();
        $this->validate(request(), [
            'photo' => 'required|image|max:2048'   //|dimensions:min_height
        ]);
        $photo = request()->file('photo');

        $photoStore = $photo->store('posts'); // para public
        //$photoStore = $photo->store('posts', 'public');  // para store
        //$photoUrl = Storage::url($photoStore);   //codigo anterior

        //dd($photoStore);
        $post->photos()->create([
            'url' => '/img/'.$photoStore,
            //'url' => Storage::url($photoStore),    // public_path().
        ]);
        /*Photo::create([
            'url' => Storage::url($photoStore),
            'post_id' => $post->id
        ]);*/
    }

    public function destroy(Photo $photo){
        $photo->delete();

        /*$photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);*/
        //dd($photoPath);
        
        //Storage::disk('public')->delete($photo->url);
        return back()->with('flash', 'Foto eliminada');
    }
}
