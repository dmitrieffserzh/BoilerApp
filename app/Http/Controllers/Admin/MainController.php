<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller {


    public function __construct(){
        // $this->middleware('auth');
    }


    public function index() {




        // GET TAXONOMIES

        $tax = Taxonomy::where('content_type', 'posts')->get();

        //dd( $tax );




        // GET POSTS
        $tax = Taxonomy::where('content_type', 'posts')->find(5);
        $posts = $tax->posts;
        // dd( $posts );



        // GET POST TAXONOMY

        $post = Post::find(4);
        $tax = $post->taxonomy;

        //dd( $tax );


        return view('main');
    }

}
