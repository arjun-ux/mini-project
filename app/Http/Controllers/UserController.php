<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // index
    public function index()
    {
        $this->authorize('superadmin');
        $title = 'User Manajemen';
        $getUser = User::with('Roles')->get();
        $getRole = Role::all();
        // dd($getUser);
        return view('dashboard.user.index', compact('getUser','getRole','title'));
    }
    // store user
    public function store(Request $request)
    {
        $this->authorize('superadmin');
        $data = $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id'=> 'required',
        ]);
        // dd($data);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->back()->with('pesan','Berhasil Menyimpan Data');
    }
    // edit data user
    public function edit($id)
    {
        $this->authorize('superadmin');
        $title = 'Edit Data';
        $getData = User::findOrFail($id);
        $getRole = Role::all();
        // dd($getRole);
        return view('dashboard.user.edit', compact('title','getData','getRole'));
    }
    // update data user dengan role
    public function update(Request $request, $id)
    {
        $this->authorize('superadmin');
        $data = $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
        $dataUser = User::find($id);
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->role_id = $request->role_id;
        $dataUser->save();
        return redirect()->route('user.index')->with('pesan','Berhasil Update Data User');
    }
    // hapus data user
    public function delete($id)
    {
        $this->authorize('superadmin');
        if (Auth::user()->Roles->name === 'superadmin') {
            if ($id == Auth::id()) {
                return back()->with('error','Superadmin Tidak Boleh Bunuh Diri');
            }
            $getUser = User::find($id);
            if (!$getUser) {
                abort(404);
            }
            $getUser->delete();
            return redirect()->back()->with(['error'=>'Data Berhasil Dihapus']);
        }

    }
}
