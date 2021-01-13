<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // define table name

    use HasFactory;

    public function bookItems() {
        return $this->belongsToMany('App\Models\Role', 'roles_book_item', 'role_id', 'bookItem_id');
    }

}
