<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Premium;
use Illuminate\Http\Request;

class Members extends Controller
{
    public function index (Request $request)
    {
        $limit = request('limit', 10);
        $members = Member::latest()->paginate($limit);

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

    public function premium ($id)
    {
        $premium = Premium::findOrFail($id);
        return view('members.premium', ['premium' => $premium]);
    }
}
