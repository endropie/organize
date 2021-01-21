<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function premiums ()
    {
        return $this->hasMany(\App\Models\Premium::class);
    }

    public function members ()
    {
        return $this->hasManyThrough(\App\Models\Member::class, \App\Models\Premium::class);
    }
}
