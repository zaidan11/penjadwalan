<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_olah extends Model
{
    use HasFactory;
    protected $table = 'coass_olah';

    public function IdStase()
    {
        return $this->belongsTo(coass_stase::class, 'id_stase');
    }
    public function IdMhs()
    {
        return $this->belongsTo(coass_mhs::class, 'id_mhs');
    }

    // public function user()
    // {
    //     return $this->belongsTo(users::class);
    // }
}
