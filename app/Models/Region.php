<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\HasKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, Filterable, HasKeyUUID;

    public $timestamps = false;

    protected $fillable = ['code', 'name'];

    public function premiums ()
    {
        return $this->hasMany(\App\Models\Premium::class);
    }

    public function members ()
    {
        return $this->hasManyThrough(\App\Models\Member::class, \App\Models\Premium::class);
    }
}
