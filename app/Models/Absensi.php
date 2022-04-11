<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employe_id',
        'time_scan'
    ];
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
