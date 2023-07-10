<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    //     // Validasi input form
    //     $request->validate([
    //         'ruangan_id' => 'required',
    //         'id_user' => 'required',
    //         'tanggal_pinjam' => 'required',
    //         'tanggal_kembali' => 'required',
    //     ]);

    //     // Simpan peminjaman ke database
    //     Permintaan::create([
    //         'ruangan_id' => $request->ruangan_id,
    //         'user_id' => $request->id_user,
    //         'tanggal_pinjam' => $request->tanggal_pinjam,
    //         'tanggal_kembali' => $request->tanggal_kembali,
    //     ]);

    //     // Redirect ke halaman yang diinginkan setelah berhasil menyimpan
    //     return redirect()->route('ruangan.index')->with('success', 'Peminjaman berhasil disimpan.');
    // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        //
    }
}
