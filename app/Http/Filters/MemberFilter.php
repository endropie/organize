<?php
namespace App\Http\Filters;

use App\Http\Filters\Filter;
use Illuminate\Http\Request;

class MemberFilter extends Filter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}
