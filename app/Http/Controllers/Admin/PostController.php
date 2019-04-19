<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function index () {


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

}
