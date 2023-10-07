<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $invoices = invoices::all();
        $partial = round($invoices->where('Status', 'مدفوعة جزئيا')->count() / $invoices->count() * 100);
        $paid = round($invoices->where('Status', 'مدفوعة')->count() / $invoices->count() * 100);
        $unpaid = round($invoices->where('Status', 'غير مدفوعة')->count() / $invoices->count() * 100);


        // ExampleController.php

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['الفواتير غير مدفوعة', 'الفواتير المدفوعة', 'الفواتير المدفوعة جزئيا'])
            ->datasets([
                [
                    'label' => 'الفواتير',
                    'backgroundColor' => ['red', 'green', 'orange'],
                    'hoverBackgroundColor' => ['darkred', 'darkgreen', 'darkorange'], // Changement de couleur au survol
                    'data' => [$unpaid, $paid, $partial]
                ],
            ])
            ->options([
                'legend' => [
                    'display' => true,
                    'position' => 'bottom', // Position de la légende
                ],
                'title' => [
                    'display' => true,
                    'text' => 'توزيع الفواتير', // Titre du graphique
                ],
            ]);


        $chartjs1 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 218])
            ->labels(['الفواتير غير مدفوعة', 'الفواتير المدفوعة', 'الفواتير المدفوعة جزئيا'])
            ->datasets([
                [
                    'backgroundColor' => ['red', 'green', 'orange'],
                    'hoverBackgroundColor' => ['darkred', 'darkgreen', 'darkorange'], // Changement de couleur au survol
                    'data' => [$unpaid, $paid, $partial]
                ]
            ])
            ->options([
                'legend' => [
                    'display' => true,
                    'position' => 'bottom', // Position de la légende
                ],
                'title' => [
                    'display' => true,
                    'text' => 'توزيع الفواتير', // Titre du graphique
                ],
            ]);

        return view('home', compact('invoices', 'chartjs', 'chartjs1'));
    }
}
