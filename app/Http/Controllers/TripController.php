<?php

namespace App\Http\Controllers;

use App\Http\Resources\TripResource;
use App\Http\Resources\TripDetailResource;
use App\Models\Trip;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $Trip = Trip::all();
        return response()->json($Trip);
        // return TripResource ::collection($Trip);
    }

    public function show($id)
    {
        $Trip = Trip::with('writer:id,username')->find($id);
        return new TripDetailResource($Trip);
    }   

    public function show2($id)
    {
        $Trip = Trip::find($id);
        return new TripDetailResource($Trip);
    }

}
