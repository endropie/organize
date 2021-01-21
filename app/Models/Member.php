<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, Filterable;

    public function premium ()
    {
        return $this->belongsTo(\App\Models\Premium::class);
    }
}
