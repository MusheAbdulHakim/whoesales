<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $title = 'dashboard';
        $total_purchases = Purchase::where('products->expiry_date','=',Carbon::now())->count();
        $pieChart = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Total Purchases', 'Total Suppliers','Total Sales'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                    'data' => [$total_purchases, Supplier::count(), Sale::count()]
                ]
            ])
            ->options([]);
        return view('admin.dashboard',compact(
            'title','pieChart'
        ));
    }
}
