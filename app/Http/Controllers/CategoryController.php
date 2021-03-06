<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
		return view ( 'stock.categories.create', compact ( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate ( $request, [
		    'cat_name' => 'required|min:5|max:255',
		] );

		$category = new Category();
		$category->active = true;
		$category->cat_name = $request->cat_name;
		$category->cat_desc = $request->cat_desc;
		$category->save();

		\Session::flash('flash_message_success', 'Catégorie créé : ' . $category->cat_name );

		return redirect('stock/categories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate ( $request, [
			'cat_name' => 'required|min:5|max:255',
        ] );

        $category = Category::find($request->index);
        $category->active = true;
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->save();

        \Session::flash('flash_message_success','Catégorie modifiée');
        return redirect('stock/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->products->count()) {
            \Session::flash('flash_message_error','Catégorie non supprimée, car elle est utilisée par des produits');
            \Session::flash('flash_message_success','Catégorie désactivée');
            $category->active = false;
            $category->save ();
        }else{
            Category::destroy($category->id);
            \Session::flash('flash_message_success','Catégorie supprimée');
        }

        return redirect('stock/categories');
    }

}
