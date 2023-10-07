<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\user;
use App\Models\invoices_attachments;
use App\Models\invoices_details;
use App\Models\sections;
use App\Notifications\AddInvoices;
use App\Notifications\Add_invoice_new;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = invoices::all();
        return view('invoices.invoices', compact('invoices'));
    }


    public function create()
    {
        $sections = sections::all();
        return view('invoices.add_invoices', compact('sections'));
    }


    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number', // Assurez-vous que le numéro de facture est unique
            'invoice_Date' => 'required|date',
            'Due_date' => 'required|date',
            'product' => 'required',
            'Section' => 'required',
            'Amount_collection' => 'required|numeric',
            'Amount_Commission' => 'required|numeric',
            'Discount' => 'required|numeric',
            'Rate_VAT' => 'required|in:5%,10%', // Assurez-vous que la valeur de Rate_VAT est l'une des deux options
            'pic' => 'required|mimes:pdf,jpeg,jpg,png|max:10000', // Types de fichiers autorisés et taille maximale
        ]);

        // Créer une nouvelle facture
        $invoice = invoices::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);

        $invoices_id = invoices::latest()->first()->id;
        invoices_details::create([
            'id_Invoice' => $invoices_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => Auth::user()->name,
        ]);
        // Gérer le téléchargement du fichier
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName(); // Utilisez getOriginalName pour obtenir le nom du fichier d'origine

            $attachment = new invoices_attachments();
            $attachment->file_name = $file_name;
            $attachment->invoice_number = $request->invoice_number;
            $attachment->Created_by = Auth::user()->name;
            $attachment->invoice_id = $invoice->id; // Utilisez l'ID de la facture créée ci-dessus

            $attachment->save(); // Enregistrez l'attachement dans la base de données
            $image->move(public_path('attachments/' . $attachment->invoice_number), $file_name);
            // Déplacez le fichier vers le répertoire des pièces jointes
        }
        $user = User::first();
        $notification = new AddInvoices($invoices_id);
        $user->notify($notification);

        $users = User::all();
        $invoice = Invoices::latest()->first(); 
        $notification = new Add_invoice_new($invoice);
        foreach ($users as $user) {
            $user->notify($notification);
        }

        session()->flash('Add', 'تم اضافه الفاتوره بنجاح ');
        return redirect('/invoices');
    }


    public function show()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

    public function edit($id)
    {
        $invoice = invoices::findOrFail($id);
        $section = sections::all();
        return view('invoices.edit_invoices', compact('invoice', 'section'));
    }

    public function update(Request $request)
    {
        $invoices = invoices::findOrFail($request->id);
        // Créer une nouvelle facture
        $invoices->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);
        session()->flash('edit', 'تم تعديل الفاتوره بنجاح ');
        return redirect('/invoices');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $invoice = invoices::find($id);
        $attachments = invoices_attachments::where('invoice_id', $id)->get();


        foreach ($attachments as $attachment) {
            $file_path = public_path('attachments/' . $attachment->invoice_number . '/' . $attachment->file_name);

            if (file_exists($file_path)) {
                unlink($file_path); // Supprimer le fichier
            }

            $attachment->delete();
        }

        // Supprimer le répertoire
        $directory_path = public_path('attachments/' . $invoice->invoice_number);
        if (is_dir($directory_path)) {
            rmdir($directory_path); // Supprimer le répertoire
        }

        // Supprimer la facture
        $invoice->forceDelete();

        // Rediriger avec un message de succès
        return redirect('/invoices')->with('delete', 'تم حذف الفاتورة بنجاح.');
    }


    public function archive(Request $request)
    {
        $id = $request->id;
        $invoice = Invoices::find($id);

        if ($invoice) {
            // Déplacer la facture vers l'archive
            $invoice->delete();

            // Rediriger avec un message de succès personnalisé
            return redirect('/invoices')->with('delete', 'تم نقل الفاتورة إلى الأرشيف بنجاح.');
        } else {
            // Gérer le cas où la facture n'a pas été trouvée
            return redirect('/invoices')->with('delete', 'لم يتم العثور على الفاتورة.');
        }
    }




    public function getProducts($id)
    {
        $products = DB::table('products')->where('section_id', $id)->pluck('product_name', 'id');
        return json_encode($products);
    }

    public function status_update($id)
    {
        $invoice = invoices::findOrFail($id);
        $section = sections::all();
        return view('invoices.status_update', compact('invoice', 'section'));
    }
    public function paye(Request $request)
    {
        $invoice = invoices::findOrFail($request->id);
        $details = invoices_details::where('id_Invoice', $request->id)->firstOrFail();

        $status = $request->status;
        $valueStatus = null;

        if ($status == 'مدفوعة جزئيا') {
            $valueStatus = 3;
        } elseif ($status == 'مدفوعة') {
            $valueStatus = 1;
        }

        $invoice->update([
            'Status' => $request->status,
            'Value_Status' => $valueStatus,
            'Payment_Date' => $request->date_pay,
        ]);

        $details->create([
            'id_Invoice' => $request->id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'Status' => $request->status,
            'Value_Status' => $valueStatus,
            'note' => $request->note,
            'Payment_Date' => $request->date_pay,
            'user' => Auth::user()->name,
        ]);

        return redirect('/invoices')->with('pay', 'تم تغيير حالة الفاتورة بنجاح.');
    }

    public function invoices_paid()
    {
        $invoices = invoices::where('Value_Status', 1)->get();
        return view('invoices.invoices_paid', compact('invoices'));
    }
    public function invoices_unpaid()
    {
        $invoices = invoices::where('Value_Status', 2)->get();
        return view('invoices.invoices_unpaid', compact('invoices'));
    }
    public function invoices_Partial()
    {
        $invoices = invoices::where('Value_Status', 3)->get();
        return view('invoices.invoices_Partial', compact('invoices'));
    }

    public function Print($id)
    {
        $invoices = invoices::findOrFail($id)->first();
        return view('invoices.print_invoices', compact('invoices'));
    }
    public function markAsReadAll()
    {
        $userNotifications = auth()->user()->unreadNotifications;
    
        foreach ($userNotifications as $notification) {
            $notification->markAsRead();
        }
    
        return back();
    }
    
}
