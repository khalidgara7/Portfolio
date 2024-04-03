<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = \App\Models\Information::all();
        return response()->json($informations);
    }

    public function store(Request $request)
    {
        $information = new \App\Models\Information();
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->address = $request->address;
        $information->city = $request->city;
        $information->country = $request->country;
        $information->postal_code = $request->postal_code;
        $information->save();
        return response()->json('message: Information created!');
    }

    public function edit(string $id)
    {
        $information = \App\Models\Information::find($id);
        if ($information) {
            return response()->json(['message' => 'Information found!'], 200);
        } else {
            return response()->json(['message' => 'Information not found!'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $information = \App\Models\Information::findOrFail($id);
        if ($information) {
            $information->name = $request->name;
            $information->email = $request->email;
            $information->phone = $request->phone;
            $information->address = $request->address;
            $information->city = $request->city;
            $information->country = $request->country;
            $information->postal_code = $request->postal_code;
            $information->save();
            return response()->json(['message' => 'Information updated!'], 200);
        } else {
            return response()->json(['message' => 'Information not updated!'], 404);
        }
    }

    public function destroy(string $id)
    {
        $information = \App\Models\Information::findOrFail($id);
        if ($information) {
            $information->delete();
            return response()->json(['message' => 'Information deleted!'], 200);
        } else {
            return response()->json(['message' => 'Information not deleted!'], 404);
        }
    }

}
