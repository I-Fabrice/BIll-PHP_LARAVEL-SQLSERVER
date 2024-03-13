<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bil;

class BilController extends Controller
{
public function index()
{
    $bil = Bil::selectRaw('MONTHNAME(created_at) as monthname, SUM(ventes) as ventes, SUM(achats) as achats')
        ->groupBy('monthname')
        ->get();

    $month = $bil->pluck('monthname')->toArray();
    $ventes = $bil->pluck('ventes')->toArray();
    $achats = $bil->pluck('achats')->toArray();

    return view('dashboard', compact('month', 'ventes', 'achats'));
}

}
