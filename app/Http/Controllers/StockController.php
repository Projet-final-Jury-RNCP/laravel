<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all ();
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
				'cat_name' => 'required'
		] );

		$categories = new Category ();
		$categories->cat_name = $request->cat_name;
		$categories->cat_type = $request->cat_type;

		$categories->save ();

		$categories = Category::all ();
		return redirect('stock/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate ( $request, [
            'cat_name' => 'required'
        ] );
        
        $category->cat_name = $request->cat_name;
        $category->cat_type = $request->cat_type;
        
        $category->save ();
        
        $category = Category::all ();
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
        Category::destroy($category->id);
        
        return redirect('stock/categories');
    }

}
