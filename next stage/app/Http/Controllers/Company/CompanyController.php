<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Compoanies = Company::paginate(10);
     return view('Company.index',compact('Compoanies'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',


        ]);



        if($request->hasfile('file')) {
            $file=$request->file('file');
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/', $file->getClientOriginalName(), 'public');
            $Company = new Company();
            $Company->Name = $request->Name;
            $Company->Email = $request->Email;
            $Company->Website = $request->Website;

            $Company->Logo = $name;

            $Company->save();

            toastr()->success('Success Add');
            return  redirect()->route('Company.index');

        }
                // insert in image_table





    }



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

        $request->validate([
            'Name' => 'required',
            'Email' => 'required',

        ]);


        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/', $file->getClientOriginalName(), 'public');
            $Company = Company::findorfail($request->id);
            $Company->Name = $request->Name;
            $Company->Email = $request->Email;
            $Company->Website = $request->Website;

            $Company->Logo = $name;

            $Company->save();
            toastr()->warning('Success edit');
            return redirect()->route('Company.index');
        }
    }

    public function destroy(Request $request)

    {
        Company::destroy($request->id);
        toastr()->error('Success Delete');
        return  redirect()->route('Company.index');
    }
}
