<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\User as UserResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Arr;

class  AuthController extends Controller
{

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $token = null;

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    [
                        'isSuccess' => false,
                        'status'    => 400,
                        'message'   => 'La combinación de inicio de sesión / correo electrónico no es correcta, intente nuevamente.',
                    ]
                );
            }

            $data = new UserResource((User::where('email', $request->get('email')))->firstOrFail());

            /* $company_ids = [];
            foreach ($data->companies as $value) {
                array_push($company_ids, $value->id);
            }

            if (array_search($request->company, $company_ids) === false) {
                return response()->json(
                    [
                        'isSuccess' => false,
                        'status'    => 401,
                        'message'   => 'Empleado no pertenece a la empresa selecionada.',
                    ]
                );
            } */
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => false,
                    'status'    => 400,
                    'message'   => 'Ha ocurrido un error.',
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'token'     => $token,
                'objects'    => $data
            ]
        );
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'status'  => 'ok',
                'message' => 'Cierre de sesión exitoso.'
            ]);
        } catch (JWTException  $exception) {
            return response()->json([
                'status'  => 'unknown_error',
                'message' => 'Al usuario no se le pudo cerrar la sesión.'
            ], 500);
        }
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return response()->json(['user' => $user]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
