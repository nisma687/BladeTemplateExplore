<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::withTrashed()->get();
        
        return view('home',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(StudentRequest $request)
    {
        $validateData = $request->validated();
        $student = Student::withTrashed()->find($request->id);
    
        if ($student) {
            if ($student->name != $validateData['name'] || $student->class != $validateData['class'] || $student->course != $validateData['course']) {
                $student->update($validateData);
                return redirect()->route('students.index')->with('success', 'Updated data successfully');
            } else {
                return redirect()->route('students.edit', $student->id)->with('error', 'No data modified');
            }
        } else {
            return response()->json([
                "status" => "error",
                "message" => "ID not found"
            ]);
        }
    }
    
    public function storeAndUpdate(StudentRequest $request){
        $validateData=$request->validated();
        $student= Student::withTrashed()->find( $request->id );
        if($student){
            $student->update($validateData);
            return response()->json([
                "status"=> "success",
                "message"=>"successfully updated student"
            ] );
        }
        else{
            $student= Student::create($validateData);
            return response()->json([
            "status"=> "success",
            "message"=>"successfully created a new student"
        ]); 
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student= Student::withTrashed()->find( $id );
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        return view('update', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function showData(Request $request){
        $student= Student::find( $request->id );
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        return view('update', compact('student'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return 'here';
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                "status"=> "couldn't delete",
            ]);
        }

        $student->delete();

        return redirect('students')->with('success', 'Student deleted successfully');
    }
    public function restore($id)
    {
        
        $student = Student::withTrashed()->find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

     
        $student->restore();

        return redirect()->back()->with('success', 'Student restored successfully.');
    }

    public function destroyAndRestore($id)
{
    $student = Student::withTrashed()->find($id);

    if ($student) {
        if ($student->trashed()) {
            $student->restore();
            return redirect()->back()->with('success', 'Student restored successfully.');
        } else {
            $student->delete();
            return redirect('students')->with('success', 'Student deleted successfully');
        }
    } else {
        return redirect()->back()->with('error', 'Student not found');
    }
}




    public function showForm(){
        return view('form');
    }
}
