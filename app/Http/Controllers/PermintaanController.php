<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class PermintaanController extends Controller
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
        return view('request.form-request');
    }


    

    public function create($ruangan_id, $user_id)
    {
        $item = Ruangan::find($ruangan_id);
        // $id_users = Auth::user()->id;
    
        return view('request.form-request', compact('item', 'user_id'));
    }
    /**
     * Store a newly created resource in storage.
     */
  
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'user_id' => 'required',
        'ruangan_id' => 'required',
        'tanggal_pinjam' => 'required',
        'tanggal_kembali' => 'required',
        
    ]);

    $model = new Permintaan;
    $model->user_id = $request->input('user_id');
    $model->ruangan_id = $request->input('ruangan_id');
    $model->tanggal_pinjam = $request->input('tanggal_pinjam');
    $model->tanggal_kembali = $request->input('tanggal_kembali');
    $model->status= 'pending';
    $model->save();

    return redirect('/ruangan')->withSuccess('Pendaftaran berhasil.');
}

//USER DAFTAR PERMINTAAN
public function daftarPermintaan(Request $request)
{
   
    // $permintaan = Permintaan::with(['user', 'ruangan'])->get();

    $search = $request->input('search');
    $permintaan = Permintaan::with(['user', 'ruangan']);

    if ($search) {
        $permintaan->where(function ($query) use ($search) {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'LIKE', "%$search%");
            })
            ->orWhereHas('ruangan', function ($ruanganQuery) use ($search) {
                $ruanganQuery->where('nama_ruangan', 'LIKE', "%$search%");
            })
            ->orWhere('tanggal_pinjam', 'LIKE', "%$search%")
            ->orWhere('tanggal_kembali', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%");
        });
    }

    $permintaan = $permintaan->get();

    return view('request.daftar-permintaan', compact('permintaan'));
}

public function edit($id)
{
    $permintaan = Permintaan::findOrFail($id);
    return view('request.edit-permintaan', compact('permintaan'));
}

public function update(Request $request, $id)
{
    $permintaan = Permintaan::findOrFail($id);
    $permintaan->tanggal_pinjam = $request->input('tanggal_pinjam');
    $permintaan->tanggal_kembali = $request->input('tanggal_kembali');
    $permintaan->save();

    return redirect()->route('daftar-permintaan')->with('success', 'Permintaan berhasil diupdate.');
}
public function destroy($id)
{
    $permintaan = Permintaan::findOrFail($id);

    if (Gate::denies('delete-permintaan', $permintaan)) {
        abort(403, 'Anda tidak memiliki izin untuk menghapus permintaan ini.');
    }

    $permintaan->delete();

    return redirect()->route('daftar-permintaan')->with('success', 'Permintaan berhasil dihapus.');
}
   
}
