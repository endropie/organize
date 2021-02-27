<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\GenerateNumber;
use App\Traits\HasCommentable;
use App\Traits\HasKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    const COSTS = [10000, 15000, 25000];

    use HasFactory, HasKeyUUID, Filterable, HasCommentable, GenerateNumber;

    protected $table = 'premiums';

    protected $fillable = ['number', 'region_id', 'cost'];

    protected $casts = [
        'cost' => 'double'
    ];

    protected $dates = [
        'verified_at', 'created_at', 'updated_at'
    ];

    public function members ()
    {
        return $this->hasMany(\App\Models\Member::class);
    }

    public function premiables ()
    {
        return $this->hasMany(\App\Models\Premiable::class);
    }

    public function region ()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    public function getPremiPeriodNext($count = null)
    {
        $period = null;
        if (!$this->premiables->count()) {

            ## Start at verified month
            // return $this->verified_at->firstOfMonth();
            ## Start at next verified month
            $period = $this->verified_at->addMonth()->firstOfMonth();
            ## Start at 2021
            // return \Carbon\Carbon::create(2021, 1, 1);
        }
        else {
            $period = $this->premiables->orderDesc('period')->first()->period->addMonth()->firstOfMonth();
        }

        if (!$count) return (string) $period;

        $periods = [];
        for ($i=0; $i < $count ; $i++) $periods[] = (string) $period->addMonth($i ? 1 : 0);

        return $periods;
    }

    public function getPremiPeriod()
    {

    }



    protected function getUnverifiedAttribute()
    {
        return $this->members()->whereNull('verified_at')->count();
    }

    protected function getOptionMemberNamesAttribute()
    {
        return $this->members()->get()->pluck('name')->join(", ", " & ");
    }

    protected function getNumberViewAttribute()
    {
        $number = \Str::substr($this->number, 0, 3);
        $number.= 'XXXXXXX';
        $number.= \Str::substr($this->number, -4, 4);
        return $number;
    }

    public function getGenerateNumberField()
    {
        return 'code';
    }

    public function getGenerateNumberPrefix()
    {
        $region = app(Region::class)->find($this->region_id);

        if(!$region) abort(500, 'Regiona undefined');

        return 'IK2T'. $this->getGenerateNumberSeparator() . $region->code;
    }

    protected function scopeCode($query, $code)
    {
        return $query->where('code', $code)->first();
    }
}
