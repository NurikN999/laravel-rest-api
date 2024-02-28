<?php

namespace App\Http\Controllers;

use App\Http\Requests\Flight\FlightStoreRequest;
use App\Http\Resources\FlightResource;
use App\Models\Flight;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FlightController extends Controller
{

    public function index()
    {
        $flights = Flight::all();

        return response()->json([
            'data' => FlightResource::collection($flights)
        ]);
    }

    public function store(FlightStoreRequest $request)
    {
        $flight = Flight::create($request->validated());

        return response()->json([
            'data' => new FlightResource($flight)
        ], Response::HTTP_CREATED);
    }

}
