<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeaponResource;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class WeaponController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return WeaponResource::collection(Weapon::all());
    }

    public function store(Request $request): WeaponResource
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'attack_bonus' => 'integer|min:0',
            'type'         => 'required|in:sword,axe,bow,staff,dagger',
            'price'        => 'integer|min:0',
        ]);

        return new WeaponResource(Weapon::create($data));
    }

    public function show(Weapon $weapon): WeaponResource
    {
        return new WeaponResource($weapon);
    }

    public function update(Request $request, Weapon $weapon): WeaponResource
    {
        $data = $request->validate([
            'name'         => 'sometimes|string',
            'description'  => 'nullable|string',
            'attack_bonus' => 'integer|min:0',
            'type'         => 'sometimes|in:sword,axe,bow,staff,dagger',
            'price'        => 'integer|min:0',
        ]);

        $weapon->update($data);

        return new WeaponResource($weapon);
    }

    public function destroy(Weapon $weapon): Response
    {
        $weapon->delete();

        return response()->noContent();
    }
}
