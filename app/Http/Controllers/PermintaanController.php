<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;

use App\Models\Ruangan;
use Illuminate\Http\Request;
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

    // public function show($id)
    // {
    // $item = Ruangan::findOrFail($id);
    // return view('request.form-request', compact('item'));
    // }

    

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


public function daftarPermintaan()
{
    $user_id = auth()->id();
    $permintaan = Permintaan::where('user_id', $user_id)
                            
                            ->join('ruangan', 'request.ruangan_id', '=', 'ruangan.id')
                            ->select('ruangan.nama_ruangan', 'request.tanggal_pinjam', 'request.tanggal_kembali', 'request.status')
                            ->get();

    return view('request.daftar-permintaan', compact('permintaan'));
}
   
}
