<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory, Filterable;

    protected $table = 'premiums';

    public function region ()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }
}
