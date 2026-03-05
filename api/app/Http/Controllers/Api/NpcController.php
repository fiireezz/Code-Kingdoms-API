<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NpcResource;
use App\Models\Npc;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NpcController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Npc::with(['kingdom']);

        if ($request->has('kingdom_id')) {
            $query->where('kingdom_id', $request->kingdom_id);
        }
        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        return NpcResource::collection($query->get());
    }

    public function store(Request $request): NpcResource
    {
        $data = $request->validate([
            'name'       => 'required|string',
            'kingdom_id' => 'nullable|exists:kingdoms,id',
            'role'       => 'required|in:merchant,enemy,ally,quest,npc',
            'hp'         => 'integer|min:1',
            'attack'     => 'integer|min:0',
            'defense'    => 'integer|min:0',
            'speed'      => 'integer|min:0',
            'level'      => 'integer|min:1',
        ]);

        $npc = Npc::create($data);
        $npc->load(['kingdom', 'dialogs']);

        return new NpcResource($npc);
    }

    public function show(Npc $npc): NpcResource
    {
        return new NpcResource($npc->load(['kingdom', 'dialogs']));
    }

    public function update(Request $request, Npc $npc): NpcResource
    {
        $data = $request->validate([
            'name'       => 'sometimes|string',
            'kingdom_id' => 'nullable|exists:kingdoms,id',
            'role'       => 'sometimes|in:merchant,enemy,ally,quest,npc',
            'hp'         => 'integer|min:1',
            'attack'     => 'integer|min:0',
            'defense'    => 'integer|min:0',
            'speed'      => 'integer|min:0',
            'level'      => 'integer|min:1',
        ]);

        $npc->update($data);

        return new NpcResource($npc->load(['kingdom', 'dialogs']));
    }

    public function destroy(Npc $npc): Response
    {
        $npc->delete();

        return response()->noContent();
    }
}
