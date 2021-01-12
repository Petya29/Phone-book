<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookItem;
use App\Models\Categories;
use App;
use Mockery\Undefined;

class mainController extends Controller
{
    
    public function index() {
        $items = App\Models\bookItem::orderBy('id')->simplePaginate(5);   // with model
        //$items = Categories::find(1)->getbookItems()->simplePaginate(5);
        return view('main', compact('items'));
    }

    public function submitForm(Request $req) {
        $newItem = new bookItem();
        $newItem->name = $req->input('name');
        $newItem->surname = $req->input('surname');
        $newItem->email = $req->input('email');
        $newItem->phone = $req->input('phone');
        if($req->get('category') == 'Student') {
            $newItem->category_id = '1';
        }elseif($req->get('category') == 'Programmer'){
            $newItem->category_id = '2';
        }elseif($req->get('category') == 'Teacher'){
            $newItem->category_id = '3';
        }elseif($req->get('category') == 'Another'){
            $newItem->category_id = '4';
        }

        $rules = [
            'name' => 'required|min:1|max:15',
            'surname' => 'required|min:1|max:15',
            'email' => 'required|unique:bookItem|min:1|max:50',
            'phone' => '|required|unique:bookItem|min:1|max:15',
            'category' => 'required'
        ];

        $this->validate($req, $rules);

        $newItem->save();

        return redirect()->route('sortById');
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
        if($req->get('category') == 'Student') {
            $newItem->category_id = '1';
        }elseif($req->get('category') == 'Programmer'){
            $newItem->category_id = '2';
        }elseif($req->get('category') == 'Teacher'){
            $newItem->category_id = '3';
        }elseif($req->get('category') == 'Another'){
            $newItem->category_id = '4';
        }

        $rules = [
            'name' => 'required|min:1|max:15',
            'surname' => 'required|min:1|max:15',
            'email' => 'required|min:1|max:50',
            'phone' => '|required|min:1|max:15',
            'category' => 'required'
        ];

        $this->validate($req, $rules);


        $newItem->save();

        return redirect()->route('sortById');
    }

    public function deleteItem($id) {
        $item = bookItem::find($id);
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

        return view('main', compact('items'));
    }

    public function sortByName() {
        $items = bookItem::orderBy('name')->simplePaginate(5);
        return view('main', compact('items'));
    }

    public function sortBySurname() {
        $items = bookItem::orderBy('surname')->simplePaginate(5);
        return view('main', compact('items'));
    }

    public function filterByCategory(Request $req) {
            $category = $req->get('category');

            if($category == 'All categories'){
                $items = App\Models\bookItem::orderBy('id')->simplePaginate(5);
            }else{
                $items = bookItem::where('category', 'LIKE', "{$category}")->simplePaginate(5);
            }

            return response()->json(['items' => $items]);
    }

}
