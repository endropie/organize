<?php

namespace App\Http\Resources;

use App\Http\Resources\Resource;

class MemberResource extends Resource
{
    protected $fields = ['id', 'no'];

    public function toArray ($request)
    {
        return $this->property([
            // 'name' => $this->name
        ]);
    }

    protected function includes ()
    {
        return [
            'premium' => [PremiumResource::class, $this->premium],
            'region' => [RegionResource::class, $this->premium->region]
        ];
    }
}
