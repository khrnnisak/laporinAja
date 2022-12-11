<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'is_hidden',
        'isi',
        'status',
        'foto',
    ];
    public function user()
	{
		return $this->belongsTo(User::class);
	}  
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
