<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_mhs2 extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'coass_mhs2';

    public function mhs2()
    {
        return $this->hasMany(coass_olah_2::class);
    }
}
