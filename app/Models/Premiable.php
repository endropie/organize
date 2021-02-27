<?php

namespace App\Models;

use App\Traits\HasKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premiable extends Model
{
    use HasFactory, HasKeyUUID;

    public $timestamps = false;

    protected $fillable = ['period', 'price', 'premium_id', 'transaction_id'];

    protected $dates = [
        'period'
    ];
}
