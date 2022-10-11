<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array 
     */
    protected $fillable = [
        'nomor_golongan',
        'pegawai_id',
        'gaji_pokok',
        'tunjangan_keluarga',
        'tunjangan_transport',
        'tunjangan_makan',
        ]; 

    public function golongan() {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}

