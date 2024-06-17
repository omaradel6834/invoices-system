<?php

namespace App\Http\Controllers;
use App\Models\invoices;
use App\Models\invoice_achive;
use Illuminate\Http\Request;

class InvoiceAchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = invoices::onlyTrashed()->get();
        return view('invoices.archive_invoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoice_achive $invoice_achive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoice_achive $invoice_achive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoice_achive $invoice_achive)
    {
        $id = $request->invoice_id;
         invoices::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_invoice');
        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $invoices = invoices::withTrashed()->where('id',$request->invoice_id)->first();
        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/Archive');
   }
}
