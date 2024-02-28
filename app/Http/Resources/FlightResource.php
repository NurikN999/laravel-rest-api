<?php

namespace App\Http\Resources;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $arrivalLocation = Location::find($this->arrival_location);
        $departureLocation = Location::find($this->departure_location);
        return [
            'id' => $this->id,
            'iata_code' => $this->iata_code,
            'departure_location' => new LocationResource($departureLocation),
            'arrival_location' => new LocationResource($arrivalLocation),
            'departure_time' => $this->departure_time,
            'arrival_time' => $this->arrival_time,
            'company' => CompanyResource::collection($this->companies),
            'passengers' => PassengerResource::collection($this->passengers)
        ];
    }
}
