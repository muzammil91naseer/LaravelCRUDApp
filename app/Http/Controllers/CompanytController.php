<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanytController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Company::paginate(10);
        return response()->json([
            'Message ' => 'Successfully found Company Listings ',
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
        $company = new Company;
        $company->Name = $request->Name;
        $company->Address = $request->Address;
        $company->IndustryTitle = $request->IndustryTitle;

        $company->save();

        return response()->json([
            'Message ' => 'Successfully Added Company Record '
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
        $company=Company::find($id);
        if($company)
        {
            return response()->json([
                'Message ' => 'Successfully found Company Record ',
                'Data' => $company
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
        $company = Company::find($id);

        if($company)
        {
            if($request->Name)
            {
                $company->Name = $request->Name;
            }
            if($request->Address)
            {
                $company->Address = $request->Address;
            }
            if($request->IndustryTitle)
            {
                $company->IndustryTitle = $request->IndustryTitle;
            }

            $company->save();

            return response()->json([
                'Message ' => 'Successfully Updated Company Record '
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
        $company = Company::find($id);
        if($company)
        {
            $company->delete();
            return response()->json([
                'Message ' => 'Deleted Successfully'
            ]);
        }
        return response()->json([
            'Message ' => 'No Record found against provided id '
        ]);
    }
}
