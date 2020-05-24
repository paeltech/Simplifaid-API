<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Units;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Units::latest()->get();

        return response(['data' => $units ], 200);
    }

    public function store(UnitsRequest $request)
    {
        $units = Units::create($request->all());

        return response(['data' => $units ], 201);

    }

    public function show($id)
    {
        $units = Units::findOrFail($id);

        return response(['data', $units ], 200);
    }

    public function update(UnitsRequest $request, $id)
    {
        $units = Units::findOrFail($id);
        $units->update($request->all());

        return response(['data' => $units ], 200);
    }

    public function destroy($id)
    {
        Units::destroy($id);

        return response(['data' => null ], 204);
    }
}
