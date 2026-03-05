<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KingdomResource;
use App\Models\Kingdom;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class KingdomController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return KingdomResource::collection(Kingdom::all());
    }

    public function store(Request $request): KingdomResource
    {
        $data = $request->validate([
            'name'         => 'required|string|unique:kingdoms,name',
            'description'  => 'required|string',
            'lore_excerpt' => 'nullable|string',
        ]);

        return new KingdomResource(Kingdom::create($data));
    }

    public function show(Kingdom $kingdom): KingdomResource
    {
        return new KingdomResource($kingdom);
    }

    public function update(Request $request, Kingdom $kingdom): KingdomResource
    {
        $data = $request->validate([
            'name'         => 'sometimes|string|unique:kingdoms,name,' . $kingdom->id,
            'description'  => 'sometimes|string',
            'lore_excerpt' => 'nullable|string',
        ]);

        $kingdom->update($data);

        return new KingdomResource($kingdom);
    }

    public function destroy(Kingdom $kingdom): Response
    {
        $kingdom->delete();

        return response()->noContent();
    }
}
