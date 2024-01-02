<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use App\Models\User;
use Illuminate\Http\Request;

class KandangController extends Controller
{
    // index kandang
    public function index()
    {
        $title = 'Daftar Kandang';
        $getKandang = Kandang::with('User')->get();
        $peternak = 'peternak';
        $getUser = User::whereHas('Roles', function($query) use ($peternak){
            $query->where('name', $peternak);
        })->get();
        // dd($getKandang);
        return view('dashboard.kandang.index', compact('title', 'getKandang','getUser'));
    }

    // store kandang
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kandang' => 'required',
            'muatan_kandang' => 'required',
            'user_id' => 'required',
        ]);
        $kandang = new Kandang;
        $kandang->nama_kandang = $request->nama_kandang;
        $kandang->muatan_kandang = $request->muatan_kandang;
        $kandang->user_id = $request->user_id;
        $kandang->save();
        return redirect()->route('kandang.index');
    }
    // edit kandang
    public function edit($id)
    {
        $title = "Edit Data Kandang";
        $getDataKandang = Kandang::findOrFail($id);
        $peternak = 'peternak';
        $getUser = User::whereHas('Roles', function($query) use ($peternak){
            $query->where('name', $peternak);
        })->get();
        return view('dashboard.kandang.edit', compact('title','getDataKandang','getUser'));
    }
    // update kandang
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_kandang' =>'required',
            'muatan_kandang' => 'required',
            'user_id' => 'required',
        ]);
        $updateKandang = Kandang::findOrFail($id);
        $updateKandang->nama_kandang = $request->nama_kandang;
        $updateKandang->muatan_kandang = $request->muatan_kandang;
        $updateKandang->user_id = $request->user_id;
        $updateKandang->save();
        return redirect()->route('kandang.index')->with('pesan','Berhasil Update Kandang');
    }

    // delete Kandang
    public function delete($id)
    {
        $dataKandang = Kandang::findOrFail($id);
        $dataKandang->delete();
        return back()->with('hapus','Data Berhasil Di Hapus');
    }
}
