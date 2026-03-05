<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DialogResource;
use App\Models\Dialog;
use App\Models\Npc;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DialogController extends Controller
{
    public function index(Npc $npc): AnonymousResourceCollection
    {
        return DialogResource::collection($npc->dialogs()->orderBy('order')->get());
    }

    public function store(Request $request, Npc $npc): DialogResource
    {
        $data = $request->validate([
            'order' => 'integer|min:0',
            'text'  => 'required|string',
        ]);

        $dialog = $npc->dialogs()->create($data);

        return new DialogResource($dialog);
    }

    public function show(Npc $npc, Dialog $dialog): DialogResource
    {
        return new DialogResource($dialog);
    }

    public function update(Request $request, Npc $npc, Dialog $dialog): DialogResource
    {
        $data = $request->validate([
            'order' => 'integer|min:0',
            'text'  => 'sometimes|string',
        ]);

        $dialog->update($data);

        return new DialogResource($dialog);
    }

    public function destroy(Npc $npc, Dialog $dialog): Response
    {
        $dialog->delete();

        return response()->noContent();
    }
}
