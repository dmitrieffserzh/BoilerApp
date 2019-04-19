<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function index (Request $request) {
    $this->getSegmentUrl($request);

    $gfg = Post::with('taxonomy')->where('content_type', $this->content_type)->get();
    $taxonomies = Taxonomy::where('content_type', $this->content_type)->get();

     $posts = $taxonomies->with('posts')->get();
        dd($gfg);





        return view('Admin.content.index');

        // GET TAXONOMIES
       // $tax = Taxonomy::where('content_type', 'posts')->get();

        //dd( $tax );




        // GET POSTS
       // $tax = Taxonomy::where('content_type', 'posts')->find(5);
       // $posts = $tax->posts;
       // dd( $posts );



        // GET POST TAXONOMY
      //  $post = Post::find(4);
       // $tax = $post->taxonomy;

       // dd( $tax );

    }

    public function getSegmentUrl(Request $request) {
        return $this->content_type = $request->segment(2);
    }
}
