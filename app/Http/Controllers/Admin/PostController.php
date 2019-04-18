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


    public function taxonomiesCreate() {
        return view( 'Admin.taxonomies.create', [
            'taxonomy'   => null,
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->with('children')->where('parent_id', '0')->get(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }

    public function taxonomiesStore( Request $request ) {
        //dd($request->all());

        $taxonomy = new Taxonomy();

        $taxonomy->title        = $request->title;
        $taxonomy->slug         = $request->slug;
        $taxonomy->parent_id    = $request->parent_id;
        $taxonomy->_lft         = 0;
        $taxonomy->_rgt         = 0;
        $taxonomy->content_type = $this->content_type;

        $taxonomy->save();


        return redirect()->route( 'posts.category' )
            ->with( 'success', 'Категория успешно добавлена!' );
    }

    public function taxonomiesEdit( $id ) {
        return view( 'Admin.taxonomies.edit', [
            'taxonomy'   => Taxonomy::find( $id ),
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->with( 'children' )->where( 'parent_id', '0' )->get(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function taxonomiesUpdate( Request $request, $id ) {

        Taxonomy::find( $id )->update( $request->all() );
        return redirect()->route( 'posts.category' )
            ->with( 'success', 'Категория успешно обновлена!' );
    }













    ////////////

    public function show( $id ) {
        $category = Taxonomy::findOrFail( $id );
        return view( 'admin.categories.show', compact( 'category' ) );
    }
    public function edit( $id ) {
        return view( 'admin.categories.create', [
            'category'   => Taxonomy::find( $id ),
            'categories' => Taxonomy::with( 'children' )->where( 'parent_id', '0' )->get(),
            'delimiter'  => '',
        ] );
    }

    public function destroy( $id ) {
        Taxonomy::find( $id )->delete();
        return redirect()->route( 'admin.categories.index' )
            ->with( 'success', 'Категория успешно удалена!' );
    }

}
