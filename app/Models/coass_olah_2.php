<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_olah_2 extends Model
{
    use HasFactory;

    protected $table = 'coass_olah_2';

    public function IdMhs2()
    {
        return $this->belongsTo(coass_mhs2::class, 'id_mhs');
    }
    public function IdStase2()
    {
        return $this->belongsTo(coass_stase_2::class, 'id_stase');
    }
}
