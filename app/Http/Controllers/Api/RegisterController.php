<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function register(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make(
              $request->all(),
              [
                'name'     => 'required',
                'email'    => 'required|email',
                'password' => 'required',
                // 'c_password' => 'required|same:password',
              ]
            );
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $email = $request->get('email');
            $data = User::where('email', $email)->get();

            if (!$data->isEmpty()) {
                return response()->json(
                  [
                    'isSuccess' => false,
                    'messagge'  => 'El correo ya existe',
                    'status'    => 409,
                  ]
                );
            }


            $input[ 'password' ] = bcrypt($input[ 'password' ]);

            $user = User::create($input);

        } catch (QueryException $e) {
            $error = $e->getMessage();
            return response()->json([
              'isSuccess' => false,
              'messagge'  => 'Error',
              'status'    => 409,
              'error'     => $e
            ]);
        }

        return response()->json([
          'isSuccess' => true,
          'status'    => 200,
          'message'   => 'EL usuario ha sido creado.',
          'objects'   => $user
        ]);

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name'     => ['required', 'string', 'max:255'],
          'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
          'name'                 => $data[ 'name' ],
          'email'                => $data[ 'email' ],
          'password'             => Hash::make($data[ 'password' ]),
        ]);
    }
}
