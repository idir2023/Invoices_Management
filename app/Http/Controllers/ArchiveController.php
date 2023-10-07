<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;
class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $invoices = invoices::onlyTrashed()->get(); // Récupérer les factures archivées
            return view('invoices.archive_invoices', compact('invoices'));
    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

  
    
    public function update(Request $request)
    {
     $id=$request->id;
     $invoice=invoices::withTrashed()->findorfail($id)->restore();
     return redirect('/invoices')->with('restore','تم إلغاء الأرشفة بنجاح ');
    }

    
    public function destroy(Request $request)
    {
        $id = $request->id;
        $invoice = Invoices::withTrashed()->findOrFail($id);
    
        if ($invoice) {
            $invoice->forceDelete();
    
            return redirect('/archive')->with('delete', 'تم حذف الفاتورة بنجاح.');
        } else {
            return redirect('/archive')->with('error', 'لم يتم العثور على الفاتورة.');
        }
    }
    
}
