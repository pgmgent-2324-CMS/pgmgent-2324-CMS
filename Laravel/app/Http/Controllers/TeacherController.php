<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index() {
        // alle countries
        $countries = DB::table('teachers')
            ->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderBy('country', 'asc')
            ->get();

        $search = request('search');
        $country = request('country');

        //$teachers = DB::table('teachers')->get();


        $querybuilder = Teacher::query()->orderBy('firstname');

        if($search) {
            $querybuilder->where('firstname', 'LIKE', '%' . $search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $search . '%'); 
        }

        if($country) {
            $querybuilder->where('country', $country);
        }
        
        $teachers = $querybuilder->simplePaginate(30)->withQueryString();
        //
        //dd($teachers);

        return view('teacher.list', [
            'teachers' => $teachers,
            'countries' => $countries,
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
