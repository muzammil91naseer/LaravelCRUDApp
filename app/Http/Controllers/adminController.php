<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    public function getData()
    {
        $request = Request::create('api/company', 'GET');
        // handle the response
        $response = Route::dispatch($request);
        $response_obj=json_decode($response->getContent());
        $companies=json_decode($response->getContent(),true);
        //dd($companies);
        return view("admin")->with(compact('companies'));
    }
    public function deleteCompany($id)
    {
        $request = Request::create('api/company/'.$id, 'Delete');
        $response = Route::dispatch($request);
        return redirect()->route('admin_panel');

    }
    public function deleteEmployee($id)
    {
        $request = Request::create('api/employee/'.$id, 'Delete');
        $response = Route::dispatch($request);
        return redirect()->route('admin_panel');

    }
}
