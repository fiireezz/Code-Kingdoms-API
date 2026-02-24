<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CharClassResource;
use App\Models\CharClass;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CharClassController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CharClassResource::collection(CharClass::all());
    }

    public function store(Request $request): CharClassResource
    {
        $data = $request->validate([
            'name'         => 'required|string|unique:char_classes,name',
            'description'  => 'required|string',
            'role'         => 'required|string',
            'base_hp'      => 'integer|min:1',
            'base_energy'  => 'integer|min:0',
            'base_attack'  => 'integer|min:0',
            'base_defense' => 'integer|min:0',
            'base_speed'   => 'integer|min:0',
            'base_magic'   => 'integer|min:0',
            'has_magic'    => 'boolean',
        ]);

        return new CharClassResource(CharClass::create($data));
    }

    public function show(CharClass $charClass): CharClassResource
    {
        return new CharClassResource($charClass);
    }

    public function update(Request $request, CharClass $charClass): CharClassResource
    {
        $data = $request->validate([
            'name'         => 'sometimes|string|unique:char_classes,name,' . $charClass->id,
            'description'  => 'sometimes|string',
            'role'         => 'sometimes|string',
            'base_hp'      => 'integer|min:1',
            'base_energy'  => 'integer|min:0',
            'base_attack'  => 'integer|min:0',
            'base_defense' => 'integer|min:0',
            'base_speed'   => 'integer|min:0',
            'base_magic'   => 'integer|min:0',
            'has_magic'    => 'boolean',
        ]);

        $charClass->update($data);

        return new CharClassResource($charClass);
    }

    public function destroy(CharClass $charClass): Response
    {
        $charClass->delete();

        return response()->noContent();
    }
}
