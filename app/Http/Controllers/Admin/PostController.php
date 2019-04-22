<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public $content_type;

    public function index(Request $request) {
        $this->getSegmentUrl($request);

        $taxonomies = Taxonomy::where('content_type', $this->content_type)->pluck('id');
        $posts = Post::whereIn('taxonomy_id', $taxonomies)->latest()->paginate(25);
        if (!count($posts)) {
            abort(404);
        }

        return view('Admin.content.index',
            ['posts' => $posts,
                'content_type' => $this->content_type
            ]);
    }


    public function create (Request $request) {
        $this->getSegmentUrl($request);
        return view( 'Admin.content.create', [
            'taxonomy'   => null,
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function store( Request $request ) {
        $this->getSegmentUrl($request);
       //dd($request);
        Post::create($request->all());

        return redirect()->route( $this->content_type.'.index' )
            ->with( 'status', 'Пост успешно сохранен!' );
    }


    public function edit( Request $request, $id ) {
        $this->getSegmentUrl($request);

        return view( 'Admin.content.edit', [
            'post'   => $post = Post::find( $id ),
            'taxonomy' => Taxonomy::find($post->taxonomy_id),
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function update( Request $request, $id ) {
        $this->getSegmentUrl($request);
        Post::find( $id )->update( $request->all() );
        return redirect()->route( $this->content_type.'.index' )
            ->with( 'status', 'Пост успешно обновлен!' );
    }


    public function delete( Request $request, $id ) {
        $this->getSegmentUrl($request);
        Post::find( $id )->delete();
        return redirect()->route( $this->content_type.'.index' )
            ->with( 'status', 'Пост успешно удален!' );
    }



    public function getSegmentUrl(Request $request) {
        return $this->content_type = $request->segment(2);
    }
}
