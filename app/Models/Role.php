<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'permission'
    ];

    // public function permissions()
    // {
    //     return $this->hasMany(Permission::class);
    // }

}
