<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'con_posts';


    // RELATIONS
    public function taxonomy () {
        return $this->belongsTo(Taxonomy::class);
    }

}
