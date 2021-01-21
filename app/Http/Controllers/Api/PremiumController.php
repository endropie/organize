<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\Filter;
use App\Http\Controllers\ApiController;
use App\Http\Resources\PremiumResource;
use App\Models\Premium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PremiumController extends ApiController
{
    public function index (Request $request, Filter $filter)
    {
        switch ($request->get('mode')) {
            case 'all':
                $premiums = Premium::filter($filter)->latest()->limitable();
                $premiums = PremiumResource::collection($premiums);
                break;

            default:
                $premiums = Premium::filter($filter)->latest()->pagetable();
                $premiums->getCollection()->transform(function($row) {
                    return new PremiumResource($row);
                });
                break;
        }

        return response()->json($premiums);
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

        $premium = Premium::create([
            'date' => $request->date,
            'reference_number' => $request->reference_number,
            'reference_batch' => $request->reference_batch

        ]);

        DB::commit();

        return response()->json($premium, 200);
    }

    public function show ($id)
    {
        $premium = Premium::findOrFail($id);

        // return response()->json($premium);
        return new PremiumResource($premium);
    }

    public function destroy ($id)
    {
        DB::beginTransaction();

        $premium = Premium::findOrFail($id);

        $premium->forceDelete();

        DB::commit();
        return response()->json(['success' => true]);
    }
}
