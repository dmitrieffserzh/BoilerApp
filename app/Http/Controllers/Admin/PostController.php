<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public $content_type = 'posts';


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












    // TAXONOMIES !!!!!!!!!!!!!!!!!!!! REFACTORING
    public function taxonomies () {
        $taxonomies = Taxonomy::where('content_type', $this->content_type)->with('children')->where('parent_id', '0')->get();
        return view('Admin.taxonomies.index',
            [   'taxonomies'    => $taxonomies,
                'delimiter'     => '',
                'content_type'  => $this->content_type
            ]);

    }

}
