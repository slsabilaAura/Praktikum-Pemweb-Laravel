<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Ruangan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function list()
    {
        $pengajuan = Permintaan::with(['user', 'ruangan'])->get();

        return view('admin.space-approval-request', compact('pengajuan'));
    }

    public function update(Request $request, $id)
{
    $pengajuan = Permintaan::findOrFail($id);
    $pengajuan->status = $request->status;
    $pengajuan->save();

    return redirect()->route('admin.ruang')->with('success', 'Status pengajuan berhasil diubah.');
}


//space list 

public function ruang(Request $request)
{
    $search = $request->input('search');
    $ruangan = Ruangan::where('nama_ruangan', 'LIKE', "%$search%")
        ->orWhere('deskripsi_ruangan', 'LIKE', "%$search%")
        ->orWhere('luas_ruang', 'LIKE', "%$search%")
        ->paginate(10);

    return view('admin.space-list', compact('ruangan'));
}

    public function create()
    {
        return view('admin.form-ruangan');
    }

    public function store(Request $request)
    {
        
    
        $validatedData = $request->validate([
            'nama_ruangan' => 'required',
            'deskripsi_ruangan' => 'required',
            'luas_ruang' => 'required',
            'ruang_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('ruang_img')) {
            $file = $request->file('ruang_img');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/ruangan_images', $fileName);
            $validatedData['ruang_img'] = $fileName;
        }
    
        $validatedData['id_user'] = auth()->user()->id;
    
        Ruangan::create($validatedData);
    
        return redirect()->route('admin.ruang')->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Ruangan::findOrFail($id)->delete();

        return redirect()->route('admin.ruang')->with('success', 'Ruangan berhasil dihapus');
    }
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.edit-space-list', compact('ruangan'));
    }

    public function updatelist(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'nama_ruangan' => 'required',
            'deskripsi_ruangan' => 'required',
            'luas_ruang' => 'required',

        ]);

        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->deskripsi_ruangan = $request->deskripsi_ruangan;
        $ruangan->luas_ruang = $request->luas_ruang;

        if ($request->hasFile('ruang_img')) {
            $request->validate([
                'ruang_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $ruangan->ruang_img = $request->file('ruang_img')->storeAs('public/ruangan_images', $request->file('ruang_img')->getClientOriginalName());
        }

        $ruangan->save();

        return redirect()->route('admin.ruang')->with('success', 'Ruangan berhasil diperbarui');
    }
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Admin $admin)
    // {
    //     //
    // }
}
