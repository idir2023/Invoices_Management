<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.invoices_report');
    }

    public function Search_invoices(Request $request)
    {
        $radio = $request->rdio;
        if ($radio == 1) {

            if ($request->type && $request->start_at == '' && $request->end_at == '') {
                $invoices = Invoices::where('Status', $request->type)->get(); // Recherchez les factures par numéro de facture

                return view('reports.invoices_report', compact('invoices'));
            } else {
                $type = $request->type;
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);

                $invoices = Invoices::whereBetween('invoice_Date', [$start_at, $end_at])->where('Status', $type)->get(); // Recherchez les factures par numéro de facture
                return view('reports.invoices_report', compact('invoices'));
            }
        } else {
            $invoiceNumber = $request->invoice_number; // Récupérez le numéro de facture depuis la requête

            $invoices = Invoices::where('invoice_number', $invoiceNumber)->get(); // Recherchez les factures par numéro de facture

            return view('reports.invoices_report', compact('invoices'));
        }
    }
}
