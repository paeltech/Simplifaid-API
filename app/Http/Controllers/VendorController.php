<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Vendor;
use App\http\Resources\Vendor as VendorResource;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::latest()->get();

        return VendorResource::collection($vendors);
        // return response(['data' => $vendors ], 200);
    }

    public function store(VendorRequest $request)
    {
        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->avatar = $request->avatar;
        $vendor->user()->associate($request->user());

        $vendor->save();

        return new VendorResource($vendor);

        // $vendor = Vendor::create($request->all());

        // return response(['data' => $vendor ], 201);

    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);

        return response(['data', $vendor ], 200);
    }

    public function update(VendorRequest $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update($request->all());

        return response(['data' => $vendor ], 200);
    }

    public function destroy($id)
    {
        Vendor::destroy($id);

        return response(['data' => null ], 204);
    }
}
