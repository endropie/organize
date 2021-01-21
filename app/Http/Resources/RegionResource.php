<?php

namespace App\Http\Resources;

use App\Http\Resources\Resource;

class RegionResource extends Resource
{
    protected $fields = ['id', 'name'];

    protected function includes ()
    {
        return [
            'premiums' => [PremiumResource::class, $this->premiums, true],
            'members' => [MemberResource::class, $this->members, true]
        ];
    }
}
