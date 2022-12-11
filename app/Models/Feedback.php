<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $primaryKey = 'id';

    protected $fillable = [
        'isi',
        'status',
        'foto',
        'kritik',
    ];
    public function laporan()
	{
		return $this->belongsTo(Laporan::class);
	} 
}
