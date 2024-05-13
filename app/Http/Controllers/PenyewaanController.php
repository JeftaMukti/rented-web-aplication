<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use App\Models\Kontrakan;
use App\Models\Pengontrak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penyewaan::all();
        return view("penyewaan.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontrakan = Kontrakan::where('status_ketersedian','kosong')->get();
        $pengontrak = Pengontrak::all();
        return view('penyewaan.create',compact('kontrakan','pengontrak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_kontrakan" => "required",
            "id_pengontrak" => "required",
            "tanggal_mulai" => "required",
        ]);

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalBerakhir = $tanggalMulai->copy()->addMonth();

        $penyewaan = new Penyewaan();
        $penyewaan->id_kontrakan = $request->id_kontrakan;
        $penyewaan->id_pengontrak = $request->id_pengontrak;
        $penyewaan->tanggal_mulai = $tanggalMulai;
        $penyewaan->tanggal_berakhir = $tanggalBerakhir ;
        $penyewaan->status_pembayaran;
        $penyewaan->save();

        $kontrakan = Kontrakan::findOrFail($request->id_kontrakan);
        $kontrakan->status_ketersedian = "isi";
        $kontrakan->save();

        return redirect('penyewaan')->with('success','data berhasil di tambahkan');
    }

    public function cancel(Request $request ,$id)
    {
        $penyewaan = Penyewaan::findOrFail($id);
        $kontrakan = Kontrakan::findOrFail($penyewaan->id_kontrakan);
        $kontrakan->status_ketersedian = "kosong";
        $kontrakan->save();
        $penyewaan->delete();
        return redirect('penyewaan')->with('success','data berhasil dibatalakan');
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
        $kontrakan = Kontrakan::where('status_ketersedian','kosong')->get();
        $pengontrak = Pengontrak::all();
        return view('penyewaan.edit',compact('kontrakan','pengontrak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            ''
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $data = Penyewaan::where('id',$id)->delete();
        return redirect('penyewaan')->with('success','data berhasil dihapus');
    }
}
