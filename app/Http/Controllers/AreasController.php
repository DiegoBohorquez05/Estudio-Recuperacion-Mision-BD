<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index(){
        return Area::get();
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=> 'required|string',
                'department_id' => 'exists:department,id'
            ]);
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $area = Area::create([
            'name' => $request->name,
            'department_id' => $request->department_id
        ]);

        return $area;
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
                'name'=> 'string',
                'department_id' => 'exists:department,id'
            ]);
            $area=Area::findOrFail($id);
            $area->name=$request->name;
            $area->department_id=$request->department_id;
            $area->save();
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $area;
    }

    public function show(Int $id){
        try{
            $area = Area::findOnFail($id);
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Int $id){
        $area = Area::findOrFail($id);
        $area->destroy();

        return 'eliminado con exito';
    }
}
