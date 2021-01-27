<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory, Filterable;

    protected $table = 'premiums';

    protected $fillable = ['number', 'region_id'];

    public function members ()
    {
        return $this->hasMany(\App\Models\Member::class);
    }

    public function region ()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    protected function getUnverifiedAttribute()
    {
        return $this->members()->whereNull('verified_at')->count();
    }

    protected function getNumberViewAttribute()
    {
        $number = \Str::substr($this->number, 0, 3);
        $number.= 'XXXXXXX';
        $number.= \Str::substr($this->number, -4, 4);
        return $number;
    }
}
