<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);

//        return view('students.index', compact('students'))
//            ->with('i',(request()->input('page',1) -1) *5);
        return view('students.index', ['students' => $students]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        request()->validate([

            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'check_box' => 'required',

        ]);


        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/students'), $imageName);


        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->image = $imageName;
        $student->save();
//
        return redirect()->route('student.index')->with('success', 'Successfully Add Student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $image = $request->image;// image catch from input


        if ($image != '') {
            request()->validate([

                'name' => 'required|min:3',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);


            //image delete from folder
            $image1 = $student->image;
            $image_path = "images/students/" . $image1;
            @unlink($image_path);


            // upload new image and update fields
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/students'), $imageName);

            $student->name = $request->name;
            $student->email = $request->email;
            $student->department = $request->department;
            $student->image = $imageName;
            $student->save();

        } else {
            request()->validate([

                'name' => 'required|min:3',

            ]);

            $student->name = $request->name;
            $student->email = $request->email;
            $student->department = $request->department;
            $student->save();


        }

        return redirect()->route('student.index', compact('student'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //

        //image delete from folder
        $image1 = $student->image;
        $image_path = "images/students/" . $image1;
        @unlink($image_path);

        $student->forceDelete();

        return redirect()->route('student.index');
    }


}
