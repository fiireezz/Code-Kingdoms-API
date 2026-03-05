<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArmorResource;
use App\Models\Armor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ArmorController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ArmorResource::collection(Armor::all());
    }

    public function store(Request $request): ArmorResource
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'defense_bonus' => 'integer|min:0',
            'type'          => 'required|in:light,medium,heavy',
            'price'         => 'integer|min:0',
        ]);

        return new ArmorResource(Armor::create($data));
    }

    public function show(Armor $armor): ArmorResource
    {
        return new ArmorResource($armor);
    }

    public function update(Request $request, Armor $armor): ArmorResource
    {
        $data = $request->validate([
            'name'          => 'sometimes|string',
            'description'   => 'nullable|string',
            'defense_bonus' => 'integer|min:0',
            'type'          => 'sometimes|in:light,medium,heavy',
            'price'         => 'integer|min:0',
        ]);

        $armor->update($data);

        return new ArmorResource($armor);
    }

    public function destroy(Armor $armor): Response
    {
        $armor->delete();

        return response()->noContent();
    }
}
