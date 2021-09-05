<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->toArray();
        return array_reverse($companies);      
    }

    public function store(Request $request)
    {
        $company = new Company([
            'logo' => $request->input('logo'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            
        ]);
        $company->save();

        return response()->json('Company created successfully!');
    }

    public function show($id)
    {
        $company = Company::find($id);
        return response()->json($company);
    }

    public function update($id, Request $request)
    {
        $company = Company::find($id);
        $company->update($request->all());

        return response()->json('Company data updated successfully!');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return response()->json('Company deleted successfully!');
    }
}