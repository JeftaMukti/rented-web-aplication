<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengontrak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengontrakController extends Controller
{
    public function index()
    {
        $data = Pengontrak::where('user_id',auth()->id())->get();
        return view('pengontrak.index',compact('data'));
    }

    public function create()
    {
        return view('pengontrak.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama' => 'required',
            'no_tlp' => 'required',
        ]);

        $pengontrak = new Pengontrak;
        $pengontrak->nama = $request->nama;
        $pengontrak->no_tlp = $request->no_tlp;
        $pengontrak->user_id = $user->id;
        $pengontrak->save();

        return redirect('user')->with('success','data pengontrak Berhasil Dibuat');
    }

    public function edit(string $id)
    {
        $data = Pengontrak::find($id);
        return view('pengontrak.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_tlp' => 'required',
        ]);

        $pengontrak = Pengontrak::findOrFail($id);
        $data = [
            "nama" => $request->nama,
            "no_tlp" => $request->no_tlp,
        ];
        $pengontrak->update($data);
        return redirect('user')->with('success','data pengontrak berhasil Diubah');
    }

    public function destroy(string $id)
    {
        $data = Pengontrak::where('id',$id)->delete();
        return redirect('user')->with('success','data pengontrak berhasil Dihapus');
    }
}
