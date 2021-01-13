<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookItem extends Model
{
    protected $table = 'bookItem'; // define table name

        use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'roles_book_item', 'bookItem_id', 'role_id');
    }

}
