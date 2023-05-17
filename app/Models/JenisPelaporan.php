<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelaporan extends Model
{
    use HasFactory;

    protected $table = "jenis_pelaporan";
    protected $guarded = ["id"];

    public function pelaporan(){
        return $this->hasMany(Pelaporan::class);
    }
}
