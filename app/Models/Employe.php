<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Employe extends Model
{
    use HasFactory, HasApiTokens;
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'pn',
        'username',
        'password',
        'department_id'

    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'employe_id', 'id');
    }
}
