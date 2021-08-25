<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines =  medicine::all();
        //
        return view('medicine.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicine = new medicine;
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->price = $request->price;
        $medicine->save();
        return redirect(route('medicines.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(medicine $medicine)
    {
        
        return "this is show function" ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(medicine $medicine)
    {
        //
        
        
        return view('medicine.edit',compact("medicine"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medicine $medicine)
    {
       
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->price = $request->price;
        $medicine->save();
        return redirect (route('medicines.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(medicine $medicine)
    {
        $medicine->delete();
        return back();
        //
    }
}
