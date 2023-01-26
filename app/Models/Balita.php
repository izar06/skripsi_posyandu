<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balita';

    protected $fillable = ['nama_balita', 'nama_ibu', 'umur', 'jenis_kelamin', 'tgl_lahir', 'alamat'];

    public function checkup(){
        return $this->hasMany(Checkup::class);
    }

    public function checkupterbaru(){
        return $this->hasOne(Checkup::class)->ofMany('checkup_ke', 'max');
    }
}
