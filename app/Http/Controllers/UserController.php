<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ruangan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     $ruangan = Ruangan::where(function ($query) use ($keyword) {
    //         $query->where('nama_ruangan', 'LIKE', '%' . $keyword . '%')
    //             ->orWhere('deskripi_ruangan', 'LIKE', '%' . $keyword . '%')
    //             ->orWhere('luas_ruangan', 'LIKE', '%' . $keyword . '%');
                
    //     })
        
    //     ->paginate(10);

    //     $ruangan->withPath('event-details');
    //     $ruangan->appends($request->all());

    //     return view('dashboard.users', compact('ruangan', 'keyword'));
    // }

    public function index(Request $request)
    {
       

        return view('dashboard.users');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function index_profile()
     {
         $user = User::find(auth()->user()->id);
     
         return view('profile.view-user', compact('user'));
     }
     
    public function create()
    {
        $model = new User;
        return view('create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
   
        public function edit(User $user)
        {
            $user = User::find(auth()->user()->id);
            return view('profile.edit-user', compact('user'));
        }
        

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|',
                'fakultas' => 'required|',
                
                // Tambahkan validasi untuk field lainnya
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->fakultas = $request->fakultas;
            // Setel nilai field lainnya yang ingin diedit

            $user->save();

            return redirect()->route('profile.view')->with('success', 'Profil berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function create_layout(){
        return view('users');
    }

    public function edit_layout(){
        return view('users');
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
