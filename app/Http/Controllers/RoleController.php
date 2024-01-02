<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // index role
    public function index()
    {
        $title = "Role Manajemen";
        $getRole = Role::latest()->get();
        // dd($getIdRole);
        return view('dashboard.role.index', compact('getRole','title'));
    }
    // store role
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('pesan','Berhasil Menambahkan Role');
    }
    // edit role
    public function edit($id)
    {
        $title = 'Edit Role';
        $getIdRole = Role::find($id);
        return view('dashboard.role.edit', compact('getIdRole','title'));
    }
    // update role
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        // dd($validatedData);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('role.index')->with('pesan-edit','Berhasil Mengubah Data Role');
    }
    // delete role
    public function destroy($id)
    {
        $getData = Role::find($id);
        if ($getData){
            $getData->delete();
            return redirect()->back()->with('pesan','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('pesan','Data Gagal Dihapus');
        }

    }
}
