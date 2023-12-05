<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index() {

        $teachers = Teacher::all();

        return view('teacher.list', [
            'teachers' => $teachers,
        ]);
    }

    public function detail($id) {
        $teacher = Teacher::find($id);
        //$teacher = Teacher::findOrFail($id); // gaat naar 404 pagina als niet gevonden

        if(! isset($teacher->id) ) {
            //eigen redirect indien niet gevonden
            return redirect('/teachers?error=teacher-not-found');
        }


        return view ('teacher.detail', [
            'teacher' => $teacher,
        ]);
    }
}
