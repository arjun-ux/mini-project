<?php

namespace App\Http\Controllers;

use App\Models\Kambing;
use App\Models\Kandang;
use Illuminate\Http\Request;

class KambingController extends Controller
{
    // index kambing
    public function index()
    {
        $title = 'Daftar Kambing';
        $getKambing = Kambing::with('Kandang')->get();
        $getKandang = Kandang::all();
        // dd($getKandang);
        return view('dashboard.kambing.index', compact('title','getKambing','getKandang'));
    }
    // store kambing
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_kambing' =>'required',
            'riwayat_pemeriksaan' =>'required',
            'fileKambing' =>'required|mimes:pdf|between:100,500',
            'kandang_id' =>'required',
        ]);
        $dataKambing = new Kambing;
        $dataKambing->id = uuid_create();
        $dataKambing->no_kambing = $request->no_kambing;
        $dataKambing->kandang_id = $request->kandang_id;

        $jsonriwayat = $request->input('riwayat_pemeriksaan') ?? [];
        $dataJson = json_encode($jsonriwayat);
        // dd($dataJson);
        $dataKambing->riwayat_pemeriksaan = $jsonriwayat;
        $pdfKambing = $request->file('fileKambing');
        $fileName = 'pdf_'.time().'.'. $pdfKambing->getClientOriginalExtension();
        $pdfKambing->move(public_path('uploads'), $fileName);
        // $dataKambing->fileKambing = $fileName;
        $dataKambing->save();
        return redirect()->back()->with('pesan','Data berhasil Di Input');
    }
}
