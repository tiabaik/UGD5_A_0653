<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_induk_pegawai',
        'nama_pegawai',
        'id_departemen',
        'email',
        'telepon',
        'gender',
        'tanggal_bergabung',
        'status',
        ]; 

    public function pegawai() {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }
}
