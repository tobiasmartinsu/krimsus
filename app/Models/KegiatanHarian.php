<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanHarian extends Model
{
    use HasFactory;
    protected $table = "kegiatan_harian";
    // protected $fillable = ["unit", "name", "nama_kegiatan", "tanggal", "detail_kegiatan", "bukti_kegiatan", "user_id"]; 
    protected $guarded = ["id"];
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
