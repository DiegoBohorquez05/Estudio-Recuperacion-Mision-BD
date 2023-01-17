<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return Course::get();
    }

    public function show(Int $id){
        try{
            $area = Course::findOnFail($id);
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function create(Request $request){
        try{
            $request->validate([
                'type' => 'required',
                'name' => 'required',
                'area_id' => 'required|exists:area,id',
                'teacher_id' => 'required|exists:teacher,id'
            ]);
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $course = Course::create([
            'type' => $request->type,
            'name' => $request->name,
            'area_id' => $request->area_id,
            'teacher_id' => $request->teacher_id
        ]);

        return $course;
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
                'type' => 'required',
                'name' => 'required',
                'area_id' => 'required|exists:area,id',
                'teacher_id' => 'required|exists:teacher,id'
            ]);
            $course=Course::findOrFail($id);
            $course->type=$request->type;
            $course->name=$request->name;
            $course->area_id=$request->area_id;
            $course->teacher_id=$request->teacher_id;
            $course->save();
        }catch(Exeption $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $course;
    }

    public function destroy(Int $id){
        $course = Course::findOrFail($id);
        $course->destroy();

        return 'eliminado con exito';
    }
}
