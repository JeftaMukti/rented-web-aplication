<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use App\Models\Kontrakan;
use App\Models\Pengontrak;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penyewaan::where('user_id', auth()->id())->get();
        return view("penyewaan.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontrakan = Kontrakan::where('user_id', auth()->id())->where('status_ketersedian','kosong')->get();
        $pengontrak = Pengontrak::where('user_id', auth()->id())->get();
        return view('penyewaan.create',compact('kontrakan','pengontrak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
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
        $penyewaan->user_id = $user->id;
        $penyewaan->save();

        // melakukan fungsi untuk membuat status ketersedian dari kosong menjadi isi saat create penyewaan di eksekusi
        $kontrakan = Kontrakan::findOrFail($request->id_kontrakan);
        $kontrakan->status_ketersedian = "isi";
        $kontrakan->save();

        $pembayaran = new Pembayaran();
        $pembayaran->id_penyewaan = $penyewaan->id;
        $pembayaran->jumlah_pembayaran = $kontrakan->harga;
        $pembayaran->status_pembayaran = "pending";
        $pembayaran->user_id = $user->id;
        $pembayaran->save();

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
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
