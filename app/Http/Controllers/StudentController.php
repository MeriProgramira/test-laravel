<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function show($id) {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        //ovdje stavljamo sva pravila i sta zelimo da bude obavezno za studenta
        $rules = [
            'ime' => 'required',
            'odsjek' => 'required',
            'biografija' => 'required',
            'image' => 'required'
        ];

        //validacija pravila
        $request->validate($rules);

        //pozivanje funkcije za sliku
        $path = $this->uploadImage($request);

        //podaci iz forme se prosljedjuju u bazu i kreira se jedan student u bazi
        Student::create([
            'ime' => $request->ime,
            'odsjek' => $request->odsjek,
            'biografija' => $request->biografija,
            'image' => $path,
            //korisnik 1 je kreirao ovog studenta
            'user_id' => 1
        ]);

        return redirect()->route('index');
    }

    private function uploadImage(Request $request) {
        //provjerava da li postoji file
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        //ako postoji provjeri da li se moze otvoriti, je li validan
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }

        //snimi putanju
        $path = '/uploads/'.$file->getClientOriginalName();

        $file->move('uploads', $file->getClientOriginalName());

        return $path;
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request) {
        Student::where('id', $request->id)->update($request->except(["_token"]));
        return redirect()->route('index');
    }

    public function delete($id) {
        Student::find($id)->delete();
        return redirect()->route('index');
    }
}
