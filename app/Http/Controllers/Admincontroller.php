<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ILLuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function editprofile(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function storeprofile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
    
        // Proses upload gambar jika ada file yang dikirimkan
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data->profile_image = $fileName; // Menyimpan nama file ke dalam kolom 'profile_image'
        }
    
        // Simpan perubahan ke database
        $data->save();
    
        // Redirect atau melakukan tindakan lainnya setelah menyimpan profil
        // Misalnya, kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
    }
    
}
