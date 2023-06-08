<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_stase_2 extends Model
{
    use HasFactory;

    protected $table = 'coass_stase_2';

    public function stase2()
    {
        return $this->hasMany(coass_olah_2::class);
    }
}
