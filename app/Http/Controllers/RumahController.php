<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rumah::orderBy('id','desc')->paginate(5);
        return view('kontrakan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontrakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'nama_rent' => 'required',
            'tlp_rent' => 'required',
            'pembayaran' => 'required',
        ]);

        $rumah = new Rumah();
        $rumah->name = $request->name;
        $rumah->price = $request->price;
        $rumah->status = $request->status;
        $rumah->nama_rent = $request->nama_rent;
        $rumah->tlp_rent = $request->tlp_rent;
        $rumah->pembayaran = $request->pembayaran;
        $rumah->save();

        return redirect('house')->with('success','data kontrakan berhasil dibuat');
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
        $data = Rumah::find($id);
        return view('kontrakan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rumah $rumah)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'nama_rent' => 'required',
            'tlp_rent' => 'required',
            'pembayaran' => 'required',
        ]);

        $rumah->update($request->all());
        return redirect('house')->with('success','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Rumah::where('id',$id)->delete();
        return redirect('house')->with('succsess','Data Berhasil Di Hapus');
    }
}
