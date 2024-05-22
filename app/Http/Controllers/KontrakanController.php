<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kontrakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kontrakan::where('user_id', auth()->id())->get();
        return view('kontrakan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $kontrakan = Kontrakan::where('user_id',$user->id)->get();
        return view('kontrakan.create',compact('user','kontrakan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $harga = str_replace('.','', $request->harga);

        $kontrakan = new Kontrakan;
        $kontrakan->nama = $request->nama;
        $kontrakan->harga = $harga;
        $kontrakan->user_id = $user->id;
        $kontrakan->save();
        return redirect('house')->with('success','data Kontrakan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $kontrakan = Kontrakan::where('user_id',$user->id)->get();
        $data = Kontrakan::find($id);
        return view('kontrakan.edit',compact('data','user','kontrakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $kontrakan = Kontrakan::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
        ];

        $kontrakan->update($data);

        return redirect('house')->with('success', 'Data Kontrakan Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = kontrakan::where('id',$id)->delete();
        return redirect('house')->with('success','data Kontrakan Berhasil Dihapus');
    }
}
