<?php

namespace App\Http\Controllers;

use App\Models\letter_type;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = letter_type::all();
        return view('data-klasifikasi-surat.index', compact('surat'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-klasifikasi-surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required|numeric',
            'name_type' => 'required',

        ]);

        $code = letter_type::count();

        letter_type::create([
            'letter_code' => $request->letter_code. '-'.$code,
            'name_type' => $request->name_type,
        ]);
        
        // $requestData = $request->all();
        // $letter = new letter_type;
        // $letter->create($requestData);
        

        return redirect()->route('data-klasifikasi-surat.index')->with('success', 'Berhasil menambahkan data pengguna!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(letter_type $letter_type)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surat = Letter_type::find($id);
        return view('data-klasifikasi-surat.edit', compact('surat'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'letter_code' => 'required|numeric',
            'name_type' => 'required',
           
        ]);

        $suratData = [
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ];

        letter_type::where('id', $id)->update($suratData);

        return redirect()->route('data-klasifikasi-surat.index')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        $data = letter_type::find($id);
        $data->delete();
        return redirect()->route('data-klasifikasi-surat.index');
    }
}
