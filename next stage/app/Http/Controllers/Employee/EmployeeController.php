<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        $Company = Company::all();
        $Employee = Employee::paginate(10);

        return view('Employee.index', compact('Employee', 'Company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'First_name'=> 'required',
            'Last_name'=> 'required',
        ]);

        $Employee = new Employee();
        $Employee->First_name = $request->First_name;
        $Employee->Last_name = $request->Last_name;
        $Employee->Email = $request->Email;
        $Employee->Phone = $request->Phone;
        $Employee->company_id = $request->Company_id;
        $Employee->save();

        toastr()->success('Success Add');
        return  redirect()->route('Employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        $request->validate([
            'First_name'=> 'required',
            'Last_name'=> 'required',
        ]);

        $Employee =  Employee::findorfail($request->id);
        $Employee->First_name = $request->First_name;
        $Employee->Last_name = $request->Last_name;
        $Employee->Email = $request->Email;
        $Employee->Phone = $request->Phone;
        $Employee->company_id = $request->Company_id;
        $Employee->save();

        toastr()->warning('Success edit');
        return  redirect()->route('Employee.index');
    }


    public function destroy(Request $request)
    {
Employee::destroy($request->id);
        toastr()->error('Success Delete');
        return  redirect()->route('Employee.index');
    }
}
