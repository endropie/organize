<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\MemberFilter as Filter;
use App\Http\Controllers\ApiController;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends ApiController
{
    public function index (Request $request, Filter $filter)
    {
        switch ($request->get('mode')) {
            case 'all':
                $members = Member::filter($filter)->latest()->limitable();
                $members = MemberResource::collection($members);
                break;

            default:
                $members = Member::filter($filter)->latest()->pagetable();
                $members->getCollection()->transform(function($row) {
                    return new MemberResource($row);
                });
                break;
        }

        return response()->json($members);
    }

    public function store (Request $request)
    {
        $request->validate([
            // 'number' => ['nullable', 'unique:receives'],
            'date' => ['required', 'date'],
            'reference_number' => ['nullable'],
            'reference_batch' => ['nullable', 'required_without:referece_number',
                \Illuminate\Validation\Rule::unique('receives')->where(function ($query) use($request) {
                    return $query->where('reference_number', $request->reference_number)
                                 ->where('reference_batch', $request->reference_batch);
                })->ignore($request->id)
            ],
            'receive_items' => ['required', 'array'],
            'receive_items.*.serial' => ['required', 'unique:receive_items'],
            'receive_items.*.item.id' => ['required']
        ]);

        DB::beginTransaction();

        $member = Member::create([
            'date' => $request->date,
            'reference_number' => $request->reference_number,
            'reference_batch' => $request->reference_batch

        ]);

        DB::commit();

        return response()->json($member, 200);
    }

    public function show ($id)
    {
        $member = Member::findOrFail($id);

        // return response()->json($member);
        return new MemberResource($member);
    }

    public function destroy ($id)
    {
        DB::beginTransaction();

        $member = Member::findOrFail($id);

        $member->forceDelete();

        DB::commit();
        return response()->json(['success' => true]);
    }
}
