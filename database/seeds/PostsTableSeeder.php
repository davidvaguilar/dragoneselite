<?php

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = 'General';
        $category->save();

        $category = new Category;
        $category->name = 'Promociones';
        $category->save();

        $category = new Category;
        $category->name = 'Sociales';
        $category->save();

        $tag = new Tag;
        $tag->name = 'Happy Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Kids Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Jade Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Magic Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Tiffany Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Mercury Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Crystal Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Winehouse Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Stacy Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Black Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Gold Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Steel Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Jackson Dragons';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Presley Dragons';
        $tag->save();

        $post = new Post;
        $post->title = "Mi primeer Post";        
        $post->url = str_slug("Mi primeer Post");
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post </p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

       // $post->tags()->attach(Tag::create(['name' => 'Happy Dragons']));

        $post = new Post;
        $post->title = "Mi segundo Post";
        $post->url = str_slug("Mi segundo Post");
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post </p>";
        $post->published_at = Carbon::now()->subDays(7);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();


       // $post->tags()->attach(Tag::create(['name' => 'Happy Dragons']));

        $post = new Post;
        $post->title = "Mi tercer Post";
        $post->url = str_slug("Mi tercer Post");
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post </p>";
        $post->published_at = Carbon::now()->subDays(7);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        
       // $post->tags()->attach(Tag::create(['name' => 'Happy Dragons']));

        $post = new Post;
        $post->title = "Mi cuarto Post";
        $post->url = str_slug("Mi cuarto Post");
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post </p>";
        $post->published_at = Carbon::now()->subDays(7);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        
        //$post->tags()->attach(Tag::create(['name' => 'Happy Dragons']));
    }
}
