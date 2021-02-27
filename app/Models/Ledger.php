<?php

namespace App\Models;

use App\Traits\HasCommentable;
use App\Traits\HasKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory, HasKeyUUID, HasCommentable;

    protected $fillable = ['code', 'name', 'type', 'isgroup', 'parent'];

    public function amountables ()
    {
        return $this->hasMany(LedgerAmount::class);
    }

    public function childrens ()
    {
        return $this->hasMany(static::class, 'parent');
    }

    public function scopeCode ($query, $code)
    {
        return $query->where('code', $code)->first();
    }

    public function getGrandChildKeys ($isgroup = null)
    {
        $keys = [$this->id];
        if (!$this->childrens->count()) return $keys;
        foreach ($this->childrens as $childen) {
            $keys[] = $childen->id;
            if ($childen->getGrandChildKeys()) {
                $keys = array_merge($keys, $childen->getGrandChildKeys());
            }
        }

        return $keys;
    }

    public function getSaldoAttribute ()
    {
        $collect = Amountable::whereIn('ledger_id', $this->getGrandChildKeys());
        $itype =  in_array($this->type, ['INCOME']) ? -1 : 1;
        return (double) (($collect->sum('debit') - $collect->sum('credit')) * $itype);
    }
}
