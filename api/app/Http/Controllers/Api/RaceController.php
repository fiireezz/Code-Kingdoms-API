<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RaceResource;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RaceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RaceResource::collection(Race::all());
    }

    public function store(Request $request): RaceResource
    {
        $data = $request->validate([
            'name'           => 'required|string|unique:races,name',
            'description'    => 'required|string',
            'bonus_hp'       => 'integer',
            'bonus_energy'   => 'integer',
            'bonus_attack'   => 'integer',
            'bonus_defense'  => 'integer',
            'bonus_speed'    => 'integer',
            'bonus_magic'    => 'integer',
        ]);

        return new RaceResource(Race::create($data));
    }

    public function show(Race $race): RaceResource
    {
        return new RaceResource($race);
    }

    public function update(Request $request, Race $race): RaceResource
    {
        $data = $request->validate([
            'name'           => 'sometimes|string|unique:races,name,' . $race->id,
            'description'    => 'sometimes|string',
            'bonus_hp'       => 'integer',
            'bonus_energy'   => 'integer',
            'bonus_attack'   => 'integer',
            'bonus_defense'  => 'integer',
            'bonus_speed'    => 'integer',
            'bonus_magic'    => 'integer',
        ]);

        $race->update($data);

        return new RaceResource($race);
    }

    public function destroy(Race $race): Response
    {
        $race->delete();

        return response()->noContent();
    }
}
