<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Skill::with(['charClass', 'kingdom']);

        // Filtrar por clase o por reino
        if ($request->has('class_id')) {
            $query->where('char_class_id', $request->class_id);
        }
        if ($request->has('kingdom_id')) {
            $query->where('kingdom_id', $request->kingdom_id);
        }

        return SkillResource::collection($query->get());
    }

    public function store(Request $request): SkillResource
    {
        $data = $request->validate([
            'name'           => 'required|string',
            'description'    => 'nullable|string',
            'char_class_id'  => 'required|exists:char_classes,id',
            'kingdom_id'     => 'nullable|exists:kingdoms,id',
            'type'           => 'required|in:offensive,defensive,support',
            'damage_base'    => 'integer|min:0',
            'energy_cost'    => 'integer|min:0',
            'cooldown_turns' => 'integer|min:0',
        ]);

        $skill = Skill::create($data);
        $skill->load(['charClass', 'kingdom']);

        return new SkillResource($skill);
    }

    public function show(Skill $skill): SkillResource
    {
        return new SkillResource($skill->load(['charClass', 'kingdom']));
    }

    public function update(Request $request, Skill $skill): SkillResource
    {
        $data = $request->validate([
            'name'           => 'sometimes|string',
            'description'    => 'nullable|string',
            'char_class_id'  => 'sometimes|exists:char_classes,id',
            'kingdom_id'     => 'nullable|exists:kingdoms,id',
            'type'           => 'sometimes|in:offensive,defensive,support',
            'damage_base'    => 'integer|min:0',
            'energy_cost'    => 'integer|min:0',
            'cooldown_turns' => 'integer|min:0',
        ]);

        $skill->update($data);

        return new SkillResource($skill->load(['charClass', 'kingdom']));
    }

    public function destroy(Skill $skill): Response
    {
        $skill->delete();

        return response()->noContent();
    }
}
