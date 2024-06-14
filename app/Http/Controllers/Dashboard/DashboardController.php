<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Bills;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $users = User::where('is_admin', 0)->count();
        $transactions = Transaction::count();
        $bills = Bills::count();
        $amount = User::where('is_admin', 0)->sum('amount');
        return view('Dashboard.dashboard', compact('users', 'transactions', 'bills', 'amount'));
    }
}
