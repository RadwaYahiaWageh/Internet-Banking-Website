<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
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

        return view('User.transaction.transaction');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'account_number' => 'required|string|max:16',
            'amount' => 'required|numeric|min:1|max:999999',
        ]);
        
        $to = User::where('card_number', $request->account_number)->first();
        if($to){
            if( auth()->user()->amount < $request->amount){
                return redirect()->route('user-transaction')->with('success', "dont have enough amount.");
            }
            $data = [
                'user_id_from' => auth()->user()->id,
                'user_id_to' => $to->id,
                'amount' => $request->amount
            ];
            Transaction::create($data);
            User::where('id', $to->id)->increment('amount', $request->amount);
            User::where('id', auth()->user()->id)->decrement('amount', $request->amount);
        }else{
            return redirect()->route('user-transaction')->with('success', 'Account Not Exist.');
        }
        //Transaction::create($validatedData);
        return redirect()->route('user-transaction')->with('success', 'Transaction created successfully.');
    }
}
