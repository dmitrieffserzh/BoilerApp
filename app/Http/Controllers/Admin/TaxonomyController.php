<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxonomyController extends Controller {

    public function __construct(){
        // $this->middleware('auth');
    }


    public $content_type = $this->getSegmentUrl();

    public function taxonomies () {
        $taxonomies = Taxonomy::where('content_type', $this->content_type)->get()->toTree();
        return view('Admin.taxonomies.index',
            [   'taxonomies'    => $taxonomies,
                'delimiter'     => '',
                'content_type'  => $this->content_type
            ]);

    }


    public function taxonomiesCreate() {
        return view( 'Admin.taxonomies.create', [
            'taxonomy'   => null,
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function taxonomiesStore( Request $request ) {
        $taxonomy = new Taxonomy();
        $taxonomy->title        = $request->title;
        $taxonomy->slug         = $request->slug;
        $taxonomy->parent_id    = $request->parent_id;
        $taxonomy->_lft         = 0;
        $taxonomy->_rgt         = 0;
        $taxonomy->content_type = $this->content_type;
        $taxonomy->save();

        return redirect()->route( 'posts.category' )
            ->with( 'status', 'Категория успешно сохранена!' );
    }


    public function taxonomiesEdit( $id ) {
        return view( 'Admin.taxonomies.edit', [
            'taxonomy'   => Taxonomy::find( $id ),
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function taxonomiesUpdate( Request $request, $id ) {
        Taxonomy::find( $id )->update( $request->all() );
        return redirect()->route( 'posts.category' )
            ->with( 'status', 'Категория успешно обновлена!' );
    }


    public function taxonomiesDelete( $id ) {
        Taxonomy::find( $id )->delete();
        return redirect()->route( 'posts.category' )
            ->with( 'status', 'Категория успешно удалена!' );
    }



    public function getSegmentUrl() {
        return $url->segment(1);
    }
}
