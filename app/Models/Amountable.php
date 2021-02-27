<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\HasKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amountable extends Model
{
    use HasFactory, HasKeyUUID, Filterable;

    protected $fillable = [
        'ledger_id',
        'date',
        'label',
        'debit',
        'credit',
    ];

    protected $casts = [
        'debit' => 'double',
        'credit' => 'double',
    ];

    public function amountable ()
    {
        $this->morphTo();
    }
}
