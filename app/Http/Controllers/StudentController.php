<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'course' => 'required',
            'date_of_enrollment' => 'required|date'
        ]);
        $student = new Student();
        $student->full_name = $request->full_name;
        $student->date_of_enrollment = $request->date_of_enrollment;
        $student->date_of_course = $request->course;
        $student->save();
        return response('Student Created', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'full_name' => 'required',
            'course' => 'required',
            'date_of_enrollment' => 'required|date'
        ]);
        $student = Student::find($id);
        $student->full_name = $request->full_name;
        $student->date_of_enrollment = $request->date_of_enrollment;
        $student->date_of_course = $request->course;
        $student->save();
        return response('Student Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return response('Student Deleted', 200);

    }
}
