<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request,$id){
        $student = Student::find($id);
        $student->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
