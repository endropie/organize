<?php

namespace App\Http\Controllers;

use App\Http\Filters\MemberFilter as Filter;
use App\Models\Member;
use App\Models\Premium;
use Illuminate\Http\Request;

class Members extends Controller
{
    public function index (Request $request, Filter $filter)
    {
        $members = Member::filter($filter)->latest()->paginate(request('limit', 10));

        return view('members.index', ['members' => $members]);
    }

    public function register ()
    {
        return view('members.register');
    }

    public function show (Member $member, Request $request)
    {
        return view('members.show', ['member' => $member]);
    }

    public function premium (Premium $premium)
    {
        return view('members.premium', ['premium' => $premium]);
    }
}
