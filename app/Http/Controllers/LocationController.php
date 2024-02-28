<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $locations = Location::all();

        return response()->json([
            'data' => LocationResource::collection($locations)
        ]);
    }

}
