<?php

namespace App\Http\Controllers;

use App\Models\CompanyFlight;
use Illuminate\Http\Request;

class CompanyFlightController extends Controller
{
    public function store(Request $request)
    {
        $companyFlight = CompanyFlight::create($request->all());

        return response()->json([
            'data' => $companyFlight
        ]);
    }
}
