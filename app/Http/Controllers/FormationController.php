<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = \App\Models\Foramation::all();
        return response()->json($formations);
    }

    public function store(Request $request)
    {
        $formation = new \App\Models\Foramation();
        $formation->formation = $request->formation;
        $formation->diplome = $request->diplome;
        $formation->niveau = $request->niveau;
        $formation->mention = $request->mention;
        $formation->specialite = $request->specialite;
        $formation->description = $request->description;
        $formation->start_date = $request->start_date;
        $formation->end_date = $request->end_date;
        $formation->lieu = $request->lieu;
        $formation->save();
        return response()->json('message: Formation created!');
    }

    public function edit(string $id)
    {
        $formation = \App\Models\Foramation::find($id);
        if ($formation) {
            return response()->json(['message' => 'Formation found!'], 200);
        } else {
            return response()->json(['message' => 'Formation not found!'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $formation = \App\Models\Foramation::findOrFail($id);
        if ($formation) {
            $formation->formation = $request->formation;
            $formation->diplome = $request->diplome;
            $formation->niveau = $request->niveau;
            $formation->mention = $request->mention;
            $formation->specialite = $request->specialite;
            $formation->description = $request->description;
            $formation->start_date = $request->start_date;
            $formation->end_date = $request->end_date;
            $formation->lieu = $request->lieu;
            $formation->save();
            return response()->json(['message' => 'Formation updated!'], 200);
        } else {
            return response()->json(['message' => 'Formation not updated!'], 404);
        }
    }

    public function destroy(string $id)
    {
        $formation = \App\Models\Foramation::find($id);
        if ($formation) {
            $formation->delete();
            return response()->json(['message' => 'Formation deleted successfully !'], 200);
        } else {
            return response()->json(['message' => 'Formation not found!'], 404);
        }
    }
}
