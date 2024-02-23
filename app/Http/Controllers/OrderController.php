<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Depot;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Order::with('client', 'deliveryman', 'packages')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $user = User::firstOrCreate(['email' => $request->email], [
            'email' => $request->email,
            'password' => Hash::make('password'),
            'type' => 'client',
        ]);
        $user->client()->create();

        $order = Order::create(['client_id' => $user->id, 'state' => 'accepted', 'depot_id' => Depot::first()->id]);
        $order->packages()->attach($request->packageIds);        

        return response()->json(['message' => 'Order created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json($order->load('client', 'deliveryman', 'packages'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
