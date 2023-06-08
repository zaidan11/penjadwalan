<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_mhs extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];
    protected $table = 'coass_mhs';

    public function mhs()
    {
        return $this->hasMany(coass_olah::class);
    }
}
