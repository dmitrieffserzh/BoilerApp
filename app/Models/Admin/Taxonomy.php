<?php

namespace App\Models\Admin;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {

    use NodeTrait;


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



    // RELATIONS
    public function news () {
        return $this->hasMany(News::class, 'taxonomy_id');
    }

    public function posts () {
        return $this->hasMany(Post::class, 'taxonomy_id');
    }
}
