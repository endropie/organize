<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\HasCommentable;
use App\Traits\HasKeyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, HasKeyUUID, Filterable, HasCommentable;

    static $RELATES = ['PUSAKO', 'SUMANDO', 'ANAK', 'PARTISIPATISAN'];

    protected $fillable = ['number', 'name', 'gender', 'birth_place', 'birth_date', 'contact', 'contact_code', 'address', 'relate'];

    protected $dates = [
        'verified_at', 'created_at', 'updated_at'
    ];

    public function premium ()
    {
        return $this->belongsTo(\App\Models\Premium::class);
    }

    protected function getNumberViewAttribute()
    {
        $number = \Str::substr($this->number, 0, 3);
        $number.= 'XXXXXXX';
        $number.= \Str::substr($this->number, -4, 4);
        return $number;
    }

    protected function getContactViewAttribute()
    {
        if (!$this->contact) return null;
        $number = \Str::substr($this->contact, 0, 2);
        $number.= 'XXXXXX';
        $number.= \Str::substr($this->contact, -4, 4);
        return $number;
    }

    protected function getAgeAttribute()
    {
        return Carbon::parse($this->birth_date)->age;
    }

    protected function getGenderViewAttribute()
    {
        if ($this->gender == 'MALE') return 'Pria';
        if ($this->gender == 'FEMALE') return 'Wanita';
        return '-';
    }
}
