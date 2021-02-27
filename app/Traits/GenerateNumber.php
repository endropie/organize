<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateNumber
{
    protected static function bootGenerateNumber() {
        static::creating(function ($model) {
            if (! $model->{$model->getGenerateNumberField()}) {
                $model->{$model->getGenerateNumberField()} = (string) $model->getGenerateNextNumber();
            }
        });
    }

    public function getGenerateNumberField()
    {
        return 'number';
    }

    public function getGenerateNumberPrefix()
    {
        return 'DOC';
    }

    public function getGenerateNumberSeparator()
    {
        return '.';
    }

    public function getGenerateNumberPeriod()
    {
        return '';
    }

    public function getGenerateNextNumber($prefix = null, $separator = null, $field = null)
    {
        $separator = $separator ?: $this->getGenerateNumberSeparator();
        $prefix = $prefix ?: $this->getGenerateNumberPrefix();
        $prefix.= $separator;
        if(strlen($this->getGenerateNumberPeriod())) $prefix .= (string) $this->getGenerateNumberPeriod() . $separator;
        $field = $field ?: $this->getGenerateNumberField();

        $last = static::where($field, "LIKE", "$prefix%")->max($field) ?? 0;
        $last = \Str::of($last)->replaceFirst($prefix, "");
        $next =  intval((string) $last) + 1;
        $next = str_pad($next, 3, "0", STR_PAD_LEFT);
        return $prefix . $next;
    }
}
