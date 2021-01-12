<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'Categories'; // define table name

    use HasFactory;

    public function getbookItems() {
        return $this->hasMany('App\Models\bookItem', 'category_id', 'id');
    }


}
