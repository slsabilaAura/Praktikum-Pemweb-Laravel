<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;
use App\Models\Ruangan;


class Administrator extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = "administrator";

    protected $fillable = [
        'nama_admin',
        'email_admin',
        'password',
        'user_id',
        'ruangan_id'
    ];

        public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function ruangan()
{
    return $this->belongsTo(Ruangan::class, 'ruangan_id');
}

    // protected $guarded =[
    //     'id',
    //     'id_user',
    // ];


}
