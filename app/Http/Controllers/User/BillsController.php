<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\User;
use Illuminate\Http\Request;

class BillsController extends Controller {
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
        return view('User.bills.bills');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'organization' => 'required|string|max:200',
            'amount' => 'required|numeric|min:1|max:999999',
        ]);
        
        if(auth()->user()->amount < $request->amount){
            return redirect()->route('user-bills')->with('success', "dont have enough amount.");
        }else{
            $data = [
                'user_id' => auth()->user()->id,
                'organization' => $request->organization,
                'amount' => $request->amount
            ];
            Bills::create($data);
            User::where('id', auth()->user()->id)->decrement('amount', $request->amount);
        }
        //Transaction::create($validatedData);
        return redirect()->route('user-bills')->with('success', 'bills created successfully.');
    }
}
