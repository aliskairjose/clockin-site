<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json(
            [
            'isSuccess' => true,
            'status'=> 200,
            'message' => 'Se ha enviado el correo exitosamente!'
        ]
    );
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'isSuccess' => false,
            'status'=> 400,
            'message' => 'No se pudo enviar el correo!'
        ]);
    }
}
