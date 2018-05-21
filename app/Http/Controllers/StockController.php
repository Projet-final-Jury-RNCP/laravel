<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class StockController extends Controller {
	public function create() {
		$categories = Category::all ();
		return view ( 'stock.create', compact ( 'categories' ) );
	}
	public function store(Request $request) {
		$this->validate ( $request, [ 
				'cat_name' => 'required' 
		] );
		
		$categories = new Category ();
		$categories->cat_name = $request->cat_name;
		$categories->cat_type = $request->cat_type;
		
		$categories->save ();
		
		$categories = Category::all ();
		return view ( 'stock.create', compact ( 'categories' ) );
	}
}
