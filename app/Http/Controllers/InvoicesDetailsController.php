<?php

namespace App\Http\Controllers;

use App\Models\invoices_details;
use Illuminate\Http\Request;
use App\Models\invoices;
use App\Models\invoices_attachments;


class InvoicesDetailsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices = invoices::where('id', $id)->first();
        $details = invoices_details::where('id_Invoice', $id)->get();
        $attachement = invoices_attachments::where('invoice_id', $id)->get();

        return view('invoices.InvoicesDetails', compact('invoices', 'details', 'attachement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoice = invoices_attachments::findOrFail($request->id);
        
        if ($invoice) {
            $invoice->delete();
            
            // Assurez-vous que le répertoire et le fichier existent avant de les supprimer
            $file_path = public_path('attachments/' . $request->invoice_number . '/' . $request->file_name);
            
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            session()->flash('delete', 'تم حذف المرفق بنجاح');
        } else {
            session()->flash('delete', 'لم يتم العثور على المرفق');
        }
        
        return back();
    }

    public function viewFile($invoice_number, $file_name)
{
    // Obtenez le chemin du fichier depuis l'emplacement où vous l'avez déplacé
    $file_path = public_path('attachments/' . $invoice_number . '/' . $file_name);

    // Vérifiez si le fichier existe
    if (file_exists($file_path)) {
        return response()->file($file_path);
    } else {
        // Gérez le cas où le fichier n'existe pas
        return abort(404);
    }
}

public function download($invoice_number, $file_name)
{
    // Obtenez le chemin du fichier depuis l'emplacement où vous l'avez déplacé
    $file_path = public_path('attachments/' . $invoice_number . '/' . $file_name);

    // Vérifiez si le fichier existe
    if (file_exists($file_path)) {
        return response()->download($file_path);
    } else {
        // Gérez le cas où le fichier n'existe pas
        return abort(404);
    }
}

    

}
