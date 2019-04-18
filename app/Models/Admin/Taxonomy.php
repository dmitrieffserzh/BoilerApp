<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {

    protected $table = 'taxonomies';

    public $fillable = [
        'parent_id',
        'title',
        'slug',
    ];

    public $timestamps = false;


    public function getRouteKeyName() {
        return 'slug';
    }



    // LOCAL RELATIONS
    public function parent () {
        return $this->hasOne( self::class, 'id', 'parent_id');
    }

    public function children () {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }



    // RELATIONS
    public function news () {
        return $this->hasMany(News::class, 'taxonomy_id');
    }

    public function posts () {
        return $this->hasMany(Post::class, 'taxonomy_id');
    }
}
