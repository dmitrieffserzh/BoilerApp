<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = 'con_news';

    // RELATIONS
    public function taxonomy () {
        return $this->belongsTo(Taxonomy::class);
    }
}
