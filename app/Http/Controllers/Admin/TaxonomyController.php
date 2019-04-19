<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxonomyController extends Controller {

    public function __construct(){
        // $this->middleware('auth');
    }

    public $content_type;

    public function taxonomies (Request $request) {
        $this->getSegmentUrl($request);

        $taxonomies = Taxonomy::where('content_type', $this->content_type)->get()->toTree();
        return view('Admin.taxonomies.index',
            [   'taxonomies'    => $taxonomies,
                'delimiter'     => '',
                'content_type'  => $this->content_type
            ]);

    }


    public function taxonomiesCreate (Request $request) {
        $this->getSegmentUrl($request);
        return view( 'Admin.taxonomies.create', [
            'taxonomy'   => null,
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function taxonomiesStore( Request $request ) {
        $this->getSegmentUrl($request);
        $taxonomy = new Taxonomy();
        $taxonomy->title        = $request->title;
        $taxonomy->slug         = $request->slug;
        $taxonomy->color        = $request->color;
        $taxonomy->parent_id    = $request->parent_id;
        $taxonomy->content_type = $this->content_type;
        $taxonomy->save();

        return redirect()->route( $this->content_type.'.category' )
            ->with( 'status', 'Категория успешно сохранена!' );
    }


    public function taxonomiesEdit( Request $request, $id ) {
        $this->getSegmentUrl($request);
        return view( 'Admin.taxonomies.edit', [
            'taxonomy'   => Taxonomy::find( $id ),
            'taxonomies' => Taxonomy::where('content_type', $this->content_type)->get()->toTree(),
            'delimiter'  => '',
            'content_type'  => $this->content_type
        ] );
    }


    public function taxonomiesUpdate( Request $request, $id ) {
        $this->getSegmentUrl($request);
        Taxonomy::find( $id )->update( $request->all() );
        return redirect()->route( $this->content_type.'.category' )
            ->with( 'status', 'Категория успешно обновлена!' );
    }


    public function taxonomiesDelete( Request $request, $id ) {
        $this->getSegmentUrl($request);
        Taxonomy::find( $id )->delete();
        return redirect()->route( $this->content_type.'.category' )
            ->with( 'status', 'Категория успешно удалена!' );
    }



    public function getSegmentUrl(Request $request) {
         return $this->content_type = $request->segment(2);
    }
}
