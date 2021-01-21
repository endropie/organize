<?php

namespace App\Http\Resources;

use App\Http\Resources\Resource;

class PremiumResource extends Resource
{
    protected $fields = ['id', 'no'];

    protected function includes ()
    {
        return [
            'region' => [RegionResource::class, $this->region]
        ];
    }
}
