<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ItemResource::collection(Item::all());
    }

    public function store(Request $request): ItemResource
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'effect_type'  => 'required|in:heal_hp,restore_energy,buff_attack,buff_defense,buff_speed',
            'effect_value' => 'integer|min:0',
            'price'        => 'integer|min:0',
        ]);

        return new ItemResource(Item::create($data));
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }

    public function update(Request $request, Item $item): ItemResource
    {
        $data = $request->validate([
            'name'         => 'sometimes|string',
            'description'  => 'nullable|string',
            'effect_type'  => 'sometimes|in:heal_hp,restore_energy,buff_attack,buff_defense,buff_speed',
            'effect_value' => 'integer|min:0',
            'price'        => 'integer|min:0',
        ]);

        $item->update($data);

        return new ItemResource($item);
    }

    public function destroy(Item $item): Response
    {
        $item->delete();

        return response()->noContent();
    }
}
