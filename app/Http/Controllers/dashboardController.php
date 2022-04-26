<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('trans_status', 'SUCCESS')->sum('trans_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', "DESC")->take(5)->get();
        $pie = [
            'pending' => Transaction::where('trans_status', 'PENDING')->count(),
            'failed' => Transaction::where('trans_status', 'FAILED')->count(),
            'success' => Transaction::where('trans_status', 'SUCCESS')->count(),
        ];

        return view('Pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
