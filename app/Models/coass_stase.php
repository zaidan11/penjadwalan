<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coass_stase extends Model
{
    use HasFactory;

    protected $table = 'coass_stase';

    public function stase()
    {
        return $this->hasMany(coass_olah::class);
    }
}
