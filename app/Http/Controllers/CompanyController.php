<?php

namespace App\Http\Controllers;

use App\Company;
use App\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('pages.companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectedID = 1;
        $countries = Country::pluck('id', 'name');

        return view('pages.companies.create', compact('countries', 'selectedID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Company::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'address' => $request->address,
                'country_id' =>$request->country_id
            ]
        );

        if ($request->hasFile('picture')) {
            $path = $request->picture->store('public/images/avatar/company/' . $data->id);
            $path = str_replace('public', 'storage', $path);
            $data->save();
        }

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data =  Company::findOrFail($id);
        $selectedID = $data->country_id;
        $countries = Country::pluck('id', 'name');
        return view('pages.companies.edit', compact('data', 'countries', 'selectedID'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
