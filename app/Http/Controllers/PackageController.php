<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Package::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Package::create(
            [
                'description' => $request->description,
                'height' => $request->height,
                'width' => $request->width,
                'length' => $request->length,
                'weight' => $request->weight,
                'depot_id' => Depot::first()->id,
            ]
        );

        return response()->json(['message' => 'Package created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
