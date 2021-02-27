<?php

namespace App\Traits;

trait HasVariability
{
    protected static function bootHasVariability() {
        static::creating(function ($model) {
            if ($model->variability === null) {
                $model->variability = $model->getDefaultVariability();
            }
        });
    }

    protected function getDefaultVariability () {
        return $this->variability_defaults ?? [];
    }
}
