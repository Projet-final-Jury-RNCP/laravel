<?php

namespace App\Http\Controllers;

use App\MeasureUnit;
use Illuminate\Http\Request;

class MeasureUnitController extends Controller
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
        $measures = MeasureUnit::all ();
        return view ( 'stock.mesures.create', compact ( 'measures' ) );
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
            'measure_name' => 'required|min:1|max:255',
        ] );
        
        $measures = new MeasureUnit ();
        $measures->measure_name = $request->measure_name;
        $measures->measure_symbol = $request->measure_symbol;
        
        $measures->save ();
        
        $measures = MeasureUnit::all ();
        return redirect('stock/mesures');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MeasureUnit  $measureUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MeasureUnit $measureUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MeasureUnit  $measureUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(MeasureUnit $measureUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MeasureUnit  $measureUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate ( $request, [
            'measure_name' => 'required|min:1|max:255',
        ] );
        
        $measures = MeasureUnit::find($request->index);
        $measures->measure_name = $request->measure_name;
        $measures->measure_symbol = $request->measure_symbol;
        
        $measures->save ();
        \Session::flash('flash_message_success','Unités de mesure modifiée');
        $measures = MeasureUnit::all ();
        return redirect('stock/mesures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MeasureUnit  $measureUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeasureUnit $measureUnit)
    {
        if($measureUnit->products->count()) {
            \Session::flash('flash_message_error','Unité de mesure non supprimée, car elle est utilisée par des produits');
        }else{
            MeasureUnit::destroy($measureUnit->id);
            \Session::flash('flash_message_success','Unité de mesure supprimée');
        }
        
        return redirect('stock/mesures');
    }
}
