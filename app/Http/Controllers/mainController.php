<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\bookItem;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class mainController extends Controller
{
    
    public function index() {
        $items = App\Models\bookItem::orderBy('id')->simplePaginate(5);   // with model
        $categories = Categories::orderBy('id')->get();
        $roles = Role::get();
        return view('main', compact('items', 'categories', 'roles'));
    }

    public function submitForm(Request $req) {
        $newItem = new bookItem();
        $newItem->name = $req->input('name');
        $newItem->surname = $req->input('surname');
        $newItem->email = $req->input('email');
        $newItem->phone = $req->input('phone');
        $newItem->category_id = $req->get('category');

        $rules = [
            'name' => 'required|min:1|max:15',
            'surname' => 'required|min:1|max:15',
            'email' => 'required|unique:bookItem|min:1|max:50',
            'phone' => '|required|unique:bookItem|min:1|max:15',
            'category' => 'required',
            // 'role' => 'required'
        ];

        $this->validate($req, $rules);

        $newItem->save();

        //Roles
        if($req->input('roles')){
            $newItem->roles()->attach($req->input('roles'));
        }
        
        if($req->file('photo')) {
            Storage::disk('public')->putFileAs("/bookItemData/$newItem->name", $req->file('photo'), "$newItem->name.png");
        }

        // $newItem->save();

        return redirect()->route('sortById');
    }

    public function addNew() {
        $roles = Role::get();
        return view('addNewItem', compact('roles'));
    }

    public function updateItem($id) {
        $item = new bookItem;
        $roles = Role::get();
        return view('updateItem', ['item' => $item->find($id), 'roles' => $roles]);
    }

    public function updateItemSubmit($id, Request $req) {
        $newItem = bookItem::find($id);
        $newItem->name = $req->input('name');
        $newItem->surname = $req->input('surname');
        $newItem->email = $req->input('email');
        $newItem->phone = $req->input('phone');
        $newItem->category_id = $req->get('category');

        $rules = [
            'name' => 'required|min:1|max:15',
            'surname' => 'required|min:1|max:15',
            'email' => 'required|min:1|max:50',
            'phone' => '|required|min:1|max:15',
            'category' => 'required',
            // 'role' => 'required'
        ];

        $this->validate($req, $rules);      

        $newItem->save();

        $newItem->roles()->detach();
        if($req->input('roles')){
            $newItem->roles()->attach($req->input('roles'));
        }

        return redirect()->route('sortById');
    }

    public function deleteItem($id) {
        $item = bookItem::find($id);

        $item->roles()->detach();

        bookItem::find($id)->delete();

        return redirect()->route('sortById')->with('success', 'item was delete');
    }

    public function siteSearch(Request $req) {
        $query = $req->input('query');

        if(!$query){
            return redirect()->route('sortById');
        }

        $items = bookItem::where('name', 'LIKE', "%{$query}%")
        ->orWhere('phone', 'LIKE', "%{$query}%")
        ->simplePaginate(5);

        $categories = Categories::orderBy('id')->get();

        return view('main', compact('items', 'categories'));
    }

    public function sortByName() {
        $items = bookItem::orderBy('name')->simplePaginate(5);
        $categories = Categories::orderBy('id')->get();

        return view('main', compact('items', 'categories'));
    }

    public function sortBySurname() {
        $items = bookItem::orderBy('surname')->simplePaginate(5);
        $categories = Categories::orderBy('id')->get();

        return view('main', compact('items', 'categories'));
    }

    public function filterByCategory(Request $req) {
            $category_id = $req->get('category');

            if($category_id == '0'){
                $items = App\Models\bookItem::orderBy('id')->with('category', 'roles')->simplePaginate(5);
            }else{
                $items = bookItem::where('category_id', '=', $category_id)->with('category', 'roles')->simplePaginate(5);
            }

            return response()->json(['items' => $items]);
    }

}
