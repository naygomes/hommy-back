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
        $republic->number = $request->number;
        $republic->price = $request->price;
        $republic->vacancies = $request->vacancies;
        $republic->allowAnimals = $request->allowAnimals;
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
        if($request->number) {
            $republic->number = $request->number;
        }
        if($request->city) {
            $republic->city = $request->city;
        }
        if($request->state) {
            $republic->state = $request->state;
        }
        if($request->price) {
            $republic->price = $request->price;
        }
        if($request->vacancies) {
            $republic->vacancies = $request->vacancies;
        }
        if($request->phone) {
            $republic->phone = $request->phone;
        }
        if($request->allowAnimals) {
            $republic->allowAnimals = $request->allowAnimals;
        }
        $republic->save();
        return response()->json($republic);
    }
    
    public function deleteRepublic($id) {
        republic::destroy($id);
        return response()->json(['Produto deletado']);
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