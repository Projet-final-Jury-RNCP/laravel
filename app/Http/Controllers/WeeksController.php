<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Week;

class WeeksController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$weeks = Week::all();
		return view ( 'stock.weeks.create', compact ( 'weeks' ) );
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
				'name' => 'required|min:5|max:255',
		] );
		
		$week = new Week();
		$week->name = $request->name;
		$week->save();
		
		\Session::flash('flash_message_success', 'Semaine créé : ' . $week->name);
		
		return redirect('stock/semaines');
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Week  $week
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$this->validate ( $request, [
				'name' => 'required|min:5|max:255',
		] );
		
		$week = Week::find($request->index);
		$week->name = $request->name;
		$week->save();
		
		\Session::flash('flash_message_success','Semaine modifiée');
		return redirect('stock/semaines');
	}
	
}
