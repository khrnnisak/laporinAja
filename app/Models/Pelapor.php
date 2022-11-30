<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    use HasFactory;

    protected $table = 'pelapor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_awal',
        'nama_akhir',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
    ];
    public function user()
	{
		return $this->belongsTo(User::class);
	}  
}
