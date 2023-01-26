<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $table = 'imunisasi';
    protected $fillable = ['jenis_imunisasi', 'keterangan'];

    public function checkup(){
        return $this->hasMany(Checkup::class);
    }

}
