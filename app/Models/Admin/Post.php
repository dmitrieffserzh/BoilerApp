<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'con_posts';

    public $fillable = [
        'user_id',
        'taxonomy_id',
        'title',
        'slug',
        'content',
        'image'
    ];



    // RELATIONS
    public function taxonomy () {
        return $this->belongsTo(Taxonomy::class);
    }

}
