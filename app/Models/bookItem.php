<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookItem extends Model
{
    protected $table = 'bookItem'; // define table name

    public function category() {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    use HasFactory;
}
