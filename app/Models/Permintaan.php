<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ruangan;

class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'request';

    protected $guarded =['id'];
    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',

    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function ruangan()
{
    return $this->belongsTo(Ruangan::class, 'ruangan_id');
}
}
