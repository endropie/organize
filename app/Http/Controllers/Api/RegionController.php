<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends ApiController
{
    public function index (Request $request)
    {
        switch ($request->get('mode')) {
            case 'all':
                $regions = Region::limitable();
                $regions = RegionResource::collection($regions);
                break;

            default:
                $regions = Region::pagetable();
                $regions->getCollection()->transform(function($row) {
                    return new RegionResource($row);
                });
                break;
        }

        return response()->json($regions);
    }

    public function store (Request $request)
    {
        $request->validate(['name' => 'required']);

        $region = Region::create($request->all);

        return response()->json($region, 200);
    }

    public function show ($id)
    {
        $region = Region::findOrFail($id);

        return new RegionResource($region);
    }

    public function update ($id, Request $request)
    {
        $request->validate(['name' => 'required']);

        $region = Region::findOrFail($id);

        $region->update($request->all);

        return response()->json($region, 200);
    }

    public function destroy ($id)
    {
        DB::beginTransaction();

        $region = Region::findOrFail($id);

        $region->forceDelete();

        DB::commit();
        return response()->json(['success' => true]);
    }
}
