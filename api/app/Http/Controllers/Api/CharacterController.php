<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CharacterResource;
use App\Models\Character;
use App\Models\CharClass;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CharacterController extends Controller
{
    /**
     * Lista todos los personajes del usuario autenticado.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $characters = $request->user()
            ->characters()
            ->with(['kingdom', 'race', 'charClass', 'weapon', 'armor'])
            ->get();

        return CharacterResource::collection($characters);
    }

    /**
     * Crea un nuevo personaje calculando los stats base (clase + bonificaciones de raza).
     */
    public function store(Request $request): CharacterResource
    {
        $data = $request->validate([
            'name'          => 'required|string|max:60',
            'kingdom_id'    => 'required|exists:kingdoms,id',
            'race_id'       => 'required|exists:races,id',
            'char_class_id' => 'required|exists:char_classes,id',
        ]);

        $class = CharClass::findOrFail($data['char_class_id']);
        $race  = Race::findOrFail($data['race_id']);

        // Stats finales = base clase + bonificaciones de raza
        $stats = [
            'hp'         => $class->base_hp      + $race->bonus_hp,
            'max_hp'     => $class->base_hp      + $race->bonus_hp,
            'energy'     => $class->base_energy  + $race->bonus_energy,
            'max_energy' => $class->base_energy  + $race->bonus_energy,
            'attack'     => $class->base_attack  + $race->bonus_attack,
            'defense'    => $class->base_defense + $race->bonus_defense,
            'speed'      => $class->base_speed   + $race->bonus_speed,
            'magic'      => $class->base_magic   + $race->bonus_magic,
        ];

        $character = $request->user()->characters()->create(
            array_merge($data, $stats, ['level' => 1, 'experience' => 0, 'gold' => 100])
        );

        // Asignar todas las habilidades de la clase al personaje (bloqueadas por defecto)
        // La primera habilidad de cada clase se desbloquea al crear el personaje
        $classSkills = $class->skills()->pluck('id');
        $firstSkillId = $classSkills->first();

        $skillsToAttach = $classSkills->mapWithKeys(function ($skillId) use ($firstSkillId) {
            return [$skillId => ['is_unlocked' => $skillId === $firstSkillId]];
        })->toArray();

        $character->skills()->attach($skillsToAttach);

        return new CharacterResource(
            $character->load(['kingdom', 'race', 'charClass', 'weapon', 'armor', 'skills', 'items'])
        );
    }

    /**
     * Muestra un personaje concreto (solo el propietario puede verlo).
     */
    public function show(Request $request, Character $character): CharacterResource
    {
        $this->authorize('view', $character);

        return new CharacterResource(
            $character->load(['kingdom', 'race', 'charClass', 'weapon', 'armor', 'skills', 'items'])
        );
    }

    /**
     * Actualiza el personaje: equipamiento, oro, experiencia, nivel, etc.
     */
    public function update(Request $request, Character $character): CharacterResource
    {
        $this->authorize('update', $character);

        $data = $request->validate([
            'name'       => 'sometimes|string|max:60',
            'level'      => 'sometimes|integer|min:1',
            'experience' => 'sometimes|integer|min:0',
            'gold'       => 'sometimes|integer|min:0',
            'hp'         => 'sometimes|integer|min:0',
            'energy'     => 'sometimes|integer|min:0',
            'weapon_id'  => 'nullable|exists:weapons,id',
            'armor_id'   => 'nullable|exists:armors,id',
        ]);

        $character->update($data);

        return new CharacterResource(
            $character->load(['kingdom', 'race', 'charClass', 'weapon', 'armor', 'skills', 'items'])
        );
    }

    /**
     * Elimina el personaje del usuario.
     */
    public function destroy(Request $request, Character $character): Response
    {
        $this->authorize('delete', $character);

        $character->delete();

        return response()->noContent();
    }
}
