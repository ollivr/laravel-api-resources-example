<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Http\Resources\FlightResource;
use Spatie\QueryBuilder\QueryBuilder;

class FlightController extends Controller
{
    public function index()
    {
        $flights = QueryBuilder::for(Flight::class)
            ->allowedIncludes('passengers')
            ->get();

        return FlightResource::collection($flights);
    }

    public function show($id)
    {
        $flight = QueryBuilder::for(Flight::class)
            ->allowedIncludes('passengers')
            ->find($id);

        return FlightResource::make($flight);
    }
}
