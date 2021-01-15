<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Employee::paginate(10);
        return response()->json([
            'Message ' => 'Successfully found Employee Listings ',
            'Data' => $data
        ]);
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
        $employee = new Employee;
        $employee->Name = $request->Name;
        $employee->Address = $request->Address;
        $employee->Designation = $request->Designation;
        if($request->company_id)
        {
            $employee->company_id = $request->company_id;
        }

        $employee->save();

        return response()->json([
            'Message ' => 'Successfully Added Employee Record '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);
        if($employee)
        {
            return response()->json([
                'Message ' => 'Successfully found Employee Record ',
                'Data' => $employee
            ]);

        }
        else
        {
            return response()->json([
                'Message ' => 'No Record Found '
            ]);

        }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if($employee)
        {
            if($request->Name)
            {
                $employee->Name = $request->Name;
            }
            if($request->Address)
            {
                $employee->Address = $request->Address;
            }
            if($request->Designation)
            {
                $employee->Designation = $request->Designation;
            }
            if($request->company_id)
            {
                $employee->company_id = $request->company_id;
            }

            $employee->save();

            return response()->json([
                'Message ' => 'Successfully Updated Employee Record '
            ]);
        }
        else
        {
            return response()->json([
                'Message ' => 'No Record found against provided id '
            ]);

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $employee->delete();
            return response()->json([
                'Message ' => 'Deleted Successfully'
            ]);
        }
        return response()->json([
            'Message ' => 'No Record found against provided id '
        ]);
    }
}
