<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\letter_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = User::where('role','guru') ->get();
        return view('Staff.index', compact('staff'));
    }

    public function index2()
    {
        $guru = User::where('role','guru') ->get();
        return view('dataGuru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Staff.create');
    }

    public function create2()
    {
        $guru = User::all();
        return view('dataGuru.create', compact('guru'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
        ]);

        $email = substr($request->email, 0, 3);
        $name = substr($request->name, 0, 3);
        $hashedPassword = Hash::make($name . $email);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => 'staff',
        ]);

        return redirect()->route('Staff.index')->with('success', 'Berhasil menambahkan data pengguna!');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
          
        ]);

        $name = substr($request->name, 0, 3);
        $email = substr($request->email, 0, 3);
        
        $hashedPassword = Hash::make($name . $email);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,  
            'role' => 'guru',
        ]);

        return redirect()->route('dataGuru.index')->with('success', 'Berhasil menambahkan data pengguna!');}

    
    /**
     * Display the specified resource.
     */
    public function show (string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = User::find($id);
        return view('staff.edit', compact('staff'));
    }

    public function edit2($id)
    {
        $guru = User::find($id);
        return view('dataGuru.edit', compact('guru'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|min:3',
                'password' => '',
            ]);
    
            $staffData = [
                'name' => $request->name,
                'email' => $request->email,
            ];
    
            if($request->filled('password')){
                $staffData['password'] = bcrypt($request->password);
            }
    
            User::where('id', $id)->update($staffData);
    
            return redirect()->route('staff.index')->with('success', 'Berhasil mengubah data!');
    }

    public function update2(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => '',
        ]);

        $guruData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->filled('password')){
            $guruData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($guruData);

        return redirect()->route('users.index2')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('Staff.index');
    }

    public function destroy2(string $id)
    {
        $guru = User::find($id);
        $guru->delete();
        return redirect()->route('dataGuru.index');
    }
}
