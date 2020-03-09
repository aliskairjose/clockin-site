<?php

namespace App\Http\Controllers;

use App\Company;
use App\Country;
use App\Events\EmailChanged;
use App\Http\Resources\CountryCollection;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    /**
     * Muestra la lista de empleados de la empresa
     */
    public function employees()
    {

        $employees = [];
        $companies = Auth::user()->companies;
        if ($companies->count() > 0) {
            $data = $companies[0]->id;
            $company = Company::findOrFail($data);
            $employees = $company->users;
        }

        return view('pages.user.employees', compact('employees'));
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
        $select = ['NO' => 0, 'SI' => 1];
        return view('pages.user.create', compact('countries', 'selectedID', 'select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $password = Str::random(10);
            $user = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'postcode' => $request->postcode,
                    'blocked' => $request->blocked,
                    'active' => $request->active,
                    'password' => Hash::make($password),
                    'role_id' => 3,
                ]
            );
        }

        $companyId = Auth::user()->companies[0]->id;
        $user->companies()->attach($companyId);

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = User::findOrFail($id);
        return view('pages.user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $selectedID = $data->country_id;
        $countries = Country::pluck('id', 'name');
        $select = ['NO' => 0, 'SI' => 1];

        return view('pages.user.edit', compact('data', 'countries', 'selectedID', 'select'));
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
        // User::findOrFail($id)->update($request->all());

        $user = User::findOrFail($id);
        if ($user->email != $request->email) {
            event(new EmailChanged($user));
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->postcode = $request->postcode;

        if (isset($request->blocked)) {
            $user->blocked = $request->blocked;
        }
        if (isset($request->active)) {
            $user->active = $request->active;
        }

        if ($request->hasFile('picture')) {
            $path = $request->picture->store('public/images/avatar/' . $id);
            $path = str_replace('public', 'storage', $path);
        }

        $user->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/home');
    }

    /**
     * Remueve el empleado de la relacion con la empresa pero no de la db
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {

        $companyId = Auth::user()->companies[0]->id;
        $user = User::findOrFail($id);
        $user->companies()->detach($companyId);

        return redirect('/users/employees');
    }
}
