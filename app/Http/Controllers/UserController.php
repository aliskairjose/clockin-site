<?php

namespace App\Http\Controllers;

use App\Country;
use App\Events\EmailChanged;
use App\Http\Resources\CountryCollection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $companyId = Auth::user()->companies[0]->id;

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'postcode' => $request->postcode,
                'blocked' => $request->blocked,
                'active' => $request->active,
                'role_id' => 3,
            ]
        );

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
        if ($request->blocked) {
            $user->blocked = $request->blocked;
        }
        if ($request->active) {
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
        //
    }
}
