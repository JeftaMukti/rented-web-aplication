<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kontrakan;
use App\Models\Pengontrak;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $kontrakanisi = Kontrakan::where('user_id', auth()->id())->where('status_ketersedian', 'isi')->get();
        $kontrakankosong = Kontrakan::where('user_id', auth()->id())->where('status_ketersedian', 'kosong')->get();
        $kontrakan = Kontrakan::where('user_id', auth()->id())->get();
        $pengontrak = Pengontrak::where('user_id', auth()->id())->get();
        $penyewaan = Penyewaan::where('user_id', auth()->id())->where('status_pembayaran', 'pending')->get();
        $pembayaran = Pembayaran::where('user_id', auth()->id())->where('status_pembayaran', 'pending')->get();
        $pembayarantuntas = Pembayaran::where('user_id', auth()->id())->where('status_pembayaran', 'tuntas')->get();
        return view('dashboard.index',compact('kontrakanisi','kontrakankosong','pengontrak','penyewaan','pembayaran','pembayarantuntas','kontrakan'));
    }
}
