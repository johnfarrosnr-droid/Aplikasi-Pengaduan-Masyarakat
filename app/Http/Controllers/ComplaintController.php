<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        $response = Response::where('complaint_id', $id)->first(); 
        return view('admin.complaints.show', compact('complaint', 'response'));
    }

    public function destroy($id)
    {
        /** * PERBAIKAN: Kita ambil 'id' dari objek level.
         * Di database Anda, level 1 = Administrator, level 2 = Officer.
         */
        $userLevel = auth()->user()->level->id;

        // Cek apakah user adalah Admin (1) atau Petugas (2)
        if ($userLevel != 1 && $userLevel != 2) {
            return redirect()->route('user_home')->with('error', 'Akses Ditolak');
        }

        $complaint = Complaint::findOrFail($id);

        // Hapus Foto dari folder public/avatar_complaint
        if ($complaint->photo && File::exists(public_path('avatar_complaint/' . $complaint->photo))) {
            File::delete(public_path('avatar_complaint/' . $complaint->photo));
        }

        // Hapus Data dari database
        $complaint->delete();

        // Kembali ke halaman index pengaduan dengan pesan sukses
        return redirect()->route('complaints.index')->with('success', 'Data pengaduan berhasil dihapus');
    }
}