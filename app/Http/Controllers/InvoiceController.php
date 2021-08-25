<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\medicine;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $allReports = invoice::whereBetween('created_at', [$request->endDate, $request->startDate])->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
       });;

        if (count($allReports) == 0)
            $allReports = invoice::whereBetween('created_at', [$request->startDate, $request->endDate])->get()->groupBy(function($item) {
                return $item->created_at->format('Y-m-d');
           });;

           $reports= array();
           
           foreach($allReports as $date=>$invoices){
               $amount=0 ; 
               foreach($invoices as $invoice ){
                   $amount += $invoice->amount;

               }
               $reports[$date]=$amount;

           }
      


        return view('invoice.index',compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines =  medicine::all();
     
        return view('invoice.create',compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $invoice = invoice::create($request->all());
           return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}
