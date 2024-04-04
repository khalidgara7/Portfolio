<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = \App\Models\Experience::all();
        return response()->json($experiences);
    }

    public function store(Request $request)
    {
        return response()->json('message: Experience created!');

        $experience = new \App\Models\Experience();
        $experience->experience = $request->experience;
        $experience->poste = $request->poste;
        $experience->entreprise = $request->entreprise;
        $experience->description = $request->description;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->lieu = $request->lieu;
        $experience->secteur = $request->secteur;
        // $experience->save();
    }

    public function edit(string $id)
    {
        $experience = \App\Models\Experience::find($id);
        if ($experience) {
            return response()->json(['message' => 'Experience found!'], 200);
        } else {
            return response()->json(['message' => 'Experience not found!'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $experience = \App\Models\Experience::findOrFail($id);
        if ($experience) {
            $experience->experience = $request->experience;
            $experience->poste = $request->poste;
            $experience->entreprise = $request->entreprise;
            $experience->description = $request->description;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->lieu = $request->lieu;
            $experience->secteur = $request->secteur;
            $experience->save();
            return response()->json(['message' => 'Experience updated!'], 200);
        } else {
            return response()->json(['message' => 'Experience not updated!'], 404);
        }
    }

    public function destroy(string $id)
    {
        $experience = \App\Models\Experience::find($id);
        if ($experience) {
            $experience->delete();
            return response()->json(['message' => 'Experience deleted successfully !'], 200);
        } else {
            return response()->json(['message' => 'Experience not deleted!'], 404);
        }
    }
}
