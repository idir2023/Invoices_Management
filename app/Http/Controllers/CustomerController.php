<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\sections;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $sections = sections::all();
        return view('reports.customers_report', compact('sections'));
    }

    public function Search_customers(Request $request)
    {
        $sections = sections::all();
        $section=$request->Section;
        $product= $request->product;
        $start_at=date($request->start_at);
        $end_at=date($request->end_at);

        if($section && $product && $start_at=='' && $end_at==''){
            $invoices = invoices::where('section_id',$section)->where('product',$product)->get(); // Recherchez les factures par numéro de facture
            return view('reports.customers_report', compact('invoices' , 'sections'));
        }
        else{
            $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id',$section)->where('product',$product)->get(); // Recherchez les factures par numéro de facture
            return view('reports.customers_report', compact('invoices','sections'));
        }
    }
}
