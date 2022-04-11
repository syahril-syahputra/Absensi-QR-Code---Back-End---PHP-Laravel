<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name'

    ];


    public function employe()
    {
        return $this->hasMany(Employe::class, 'department_id', 'id');
    }

}
