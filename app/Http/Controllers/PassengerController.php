<?php

namespace App\Http\Controllers;

use App\Http\Resources\PassengerResource;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{

    public function index()
    {
        $passengers = Passenger::all();

        return response()->json([
            'data' => PassengerResource::collection($passengers)
        ]);
    }

}
