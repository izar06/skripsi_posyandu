<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;
    protected $table = 'kader';

    // protected $fillable = [
    //     'nama', 'alamat', 'umur', 'jabatan', 'status'
    // ];

    protected $guarded = [];
}
