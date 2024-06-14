<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $data = User::where('is_admin', 0)->orderBy('id', 'desc')->get();
        return view('Dashboard.users.users' , compact('data'));
    }

    public function create(){
        return view('Dashboard.users.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:14',
            'password' => 'required|string|min:8',
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['amount'] = random_int(10000, 99999);
        $validatedData['card_number'] = random_int(1000000000000000, 9999999999999999);
        $validatedData['card_expiry_month'] = random_int(00, 12);
        $validatedData['card_expiry_year'] = random_int(2025, 2040);
        $validatedData['cvv'] = random_int(111, 999);
    
        User::create($validatedData);
    
        return redirect()->route('dashboard-users')->with('success', 'User created successfully.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('Dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:14',
            'password' => 'nullable|string|min:8',
        ]);
    
        if(isset($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        $user = User::findOrFail($id);
        $user->update($validatedData);
        return redirect()->route('dashboard-users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dashboard-users')->with('success', 'User deleted successfully.');
    }
}
