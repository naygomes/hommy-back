<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\republic;
use App\User;

class RepublicController extends Controller
{
    public function createRepublic (Request $request) {
        $republic = new republic;
        $republic->name = $request->name;
        $republic->cep = $request->cep;
        $republic->complement = $request->complement;
        $republic->number = $request->number;
        $republic->price = $request->price;
        $republic->bathrooms = $request->bathrooms;
        $republic->vacancies = $request->vacancies;
        $republic->phone = $request->phone;
        $republic->allowAnimals = $request->allowAnimals;
        $republic->targetAudience = $request->targetAudience;
        $republic->billsIncluded = $request->billsIncluded;
        $republic->save();
        return response()->json($republic);
    }

    public function showRepublic($id) {
        $republic = republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic() {
        $republic = republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic(Request $request, $id) {
        $republic = republic::findOrFail($id);
        if($request->name) {
            $republic->name = $request->name;
        }
        if($request->cep) {
            $republic->cep = $request->cep;
        }
        if ($request->complement) {
            $republic->complement = $request->complement;
        }
        if($request->number) {
            $republic->number = $request->number;
        }
        if($request->price) {
            $republic->price = $request->price;
        }
        if($request->vacancies) {
            $republic->vacancies = $request->vacancies;
        }
        if($request->bathrooms) {
            $republic->bathrooms = $request->bathrooms;
        }
        if($request->phone) {
            $republic->phone = $request->phone;
        }
        if($request->allowAnimals) {
            $republic->allowAnimals = $request->allowAnimals;
        }
        if($request->targetAudience) {
            $republic->targetAudience = $request->targetAudience;
        }
        if($request->billsIncluded) {
            $republic->billsIncluded = $request->billsIncluded;
        }
        $republic->save();
        return response()->json($republic);
    }

    public function deleteRepublic($id){
        republic::destroy($id);
        return response()->json(['República deletada']);
    }

    public function addRepublic($id,$republic_id){
        $user = User::findOrFail($id);
        $republic = republic::findOrFail($republic_id);
        $republic->user_id = $republic_id;
        $republic->save();
        return response()->json($republic);
    }
    public function removeRepublic($id,$republic_id){
        $user = User::findOrFail($id);
        $republic = republic::findOrFail($republic_id);
        $republic->user_id = NULL;
        $user->save();
        return response()->json($republic);
    }
    
}