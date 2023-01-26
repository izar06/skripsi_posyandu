<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $table = 'checkup';

    protected $fillable = ['balita_id', 'berat_badan', 'vitamin_id', 'imunisasi_id', 'status_gizi', 'checkup_ke'];

    public function balita(){
        return $this->belongsTo(Balita::class);
    }

    public function vitamin(){
        return $this->belongsTo(Vitamin::class);
    }

    public function imunisasi(){
        return $this->belongsTo(Imunisasi::class);
    }
}
