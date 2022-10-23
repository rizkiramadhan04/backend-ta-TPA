<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $user = User::all();

        return view('admin.user.index', [
            'item' => $user
        ]);
    }

    public function createPage() {
        return view('admin.user.create');
    }

    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ],[
            'name.required' => 'Nama user belum diisi',
            'email.required' => 'Email belum diisi',
            'email.email' => 'Mohon masukan email yang benar',
            'email.unique' => 'Email sudah dimiliki',
            'password.required' => 'Password belum diisi',
            'tgl_lahir.required' => 'Tanggal Lahir belum diisi',
            'no_hp.required' => 'Nomor Handphone belum diisi',
            'status.required' => 'Status belum diisi',
            'tingkatan.required' => 'Tingkatan belum diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user-create-page')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_hp = $request->no_hp;
            $user->status = $request->status;
            $user->tingkatan = ($request->status == 1 ? 'Pengajar' : $request->tingkatan);

            $user->save();
            DB::commit();

            return redirect()->route('user');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.user.create')->withErrors($e->getMessage());
        }
    }

    public function updatePage($id) {

        $user = User::where('id', $id)->first();

        // dd($user);

        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:225',
            'email' => 'required|email',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ],[
            'name.required' => 'Nama user belum diisi',
            'email.required' => 'Email belum diisi',
            'email.email' => 'Mohon masukan email yang benar',
            'tgl_lahir.required' => 'Tanggal Lahir belum Diisi',
            'no_hp.required' => ' Handphone belum diisi',
            'status.required' => 'Status belum diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user-update-page', $id)->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);

        DB::beginTransaction();
        try {
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'tgl_lahir' => $request->tgl_lahir,
                'ho_hp' => $request->no_hp,
                'status' => $request->status,
                'tingkatan' => $request->tingkatan,
            ]);

            // dd($user);

            DB::commit();
            return redirect()->route('user');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.user-create-page')->withErrors($e->getMessage());
        }
    }

    public function delete(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user');
    }
}
