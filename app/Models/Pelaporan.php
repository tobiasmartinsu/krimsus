<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = ["unit_id", "nama_aduan", "id_jenis_laporan", "laporan_polisi", "pelapor", "terlapor", "tanggal", "uraian", "file_aduan"];
    protected $table = "pelaporan";
    // protected $guarded = ["id"];


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function jenis_pelaporan()
    {
        return $this->belongsTo(JenisPelaporan::class, 'id_jenis_laporan', 'id');
    }
}
