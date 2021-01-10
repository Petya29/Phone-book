<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookItem;
use App; 

class mainController extends Controller
{
    public function index() {
        $items = App\Models\bookItem::all();   // with model
        return view('main', compact('items'));
    }

    public function submitForm(Request $req) {
        $newItem = new bookItem();
        $newItem->name = $req->input('name');
        $newItem->surname = $req->input('surname');
        $newItem->email = $req->input('email');
        $newItem->phone = $req->input('phone');
        $newItem->category = $req->get('category');

        $newItem->save();

        return redirect('/');
    }

    public function addNew() {
        return view('addNewItem');
    }

    public function updateItem($id) {
        $item = new bookItem;
        return view('updateItem', ['data' => $item->find($id)]);
    }

    public function updateItemSubmit($id, Request $req) {
        $newItem = bookItem::find($id);
        $newItem->name = $req->input('name');
        $newItem->surname = $req->input('surname');
        $newItem->email = $req->input('email');
        $newItem->phone = $req->input('phone');
        $newItem->category = $req->get('category');

        $newItem->save();

        return redirect('/');
    }

    public function deleteItem($id) {
        bookItem::find($id)->delete();
        
        $items = App\Models\bookItem::all();   // with model
        return view('main', compact('items'));
    }
}
