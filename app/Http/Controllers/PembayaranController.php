<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Penyewaan;
use App\Models\Kontrakan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
   public function index()
   {
    $data = Pembayaran::where('user_id', auth()->id())->get();
    return view('pembayaran.index',compact('data'));
   }

   public function pembayaran(string $id)
   {
    $data = Pembayaran::find($id);
    return view('pembayaran.create',compact('data'));
   }

   public function bayar(Request $request, $id)
   {
       // Validasi input
       $request->validate([
           "tanggal_pembayaran" => "required|date",
       ]);
       //membuat save data untuk pembayaran
       $pembayaran = Pembayaran::findOrFail($id);
       $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
       $pembayaran->status_pembayaran = "tuntas";
       $pembayaran->save();
       //membuat save data untuk penyewaan
       $penyewaan = Penyewaan::findOrFail($pembayaran->id_penyewaan);
       $penyewaan->status_pembayaran = "tuntas";
       $penyewaan->save();
       //membuat save data untuk kontrakan
       $kontrakan = Kontrakan::findOrFail($penyewaan->id_kontrakan);
       $kontrakan->status_ketersedian = "kosong";
       $kontrakan->save();

       return redirect('pembayara')->with('success', 'Kontrakan berhasil dibayar');
   }

}
