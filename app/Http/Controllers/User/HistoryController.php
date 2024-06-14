<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Bills;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $Bills = Bills::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $Transaction = Transaction::where('user_id_from', auth()->user()->id)->with('to:id,card_number')->orderBy('id', 'desc')->get();
        $Received = Transaction::where('user_id_to', auth()->user()->id)->with('to:id,card_number')->orderBy('id', 'desc')->get();
        return view('User.history' , compact('Bills','Transaction','Received'));
    }
}
