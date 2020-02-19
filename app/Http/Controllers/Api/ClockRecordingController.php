<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClockRecording;
use App\Http\Resources\ClockRecording as ClockRecordingResource;
use App\Http\Resources\ClockRecordingCollection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClockRecordingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = new ClockRecordingCollection(ClockRecording::all());
        } catch (Exception $e) {
            return  response()->json(
                [
                    'isSuccess' => false,
                    'status' => 400,
                    'error' => $e,
                    'message' => 'Ha ocurrido un error'
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'status' => 200,
                'objects'   => $data
            ]
        );
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
        try {
            $data = ClockRecording::create($request->all());
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => false,
                    'status' => 400,
                    'error' => $e,
                    'message' => 'Ha ocurrido un error'
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'status' => 200,
                'objects' => $data
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = new ClockRecordingResource(ClockRecording::findOrFail($id));
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => false,
                    'status' => 400,
                    'error' => $e,
                    'message' => 'Ha ocurrido un error'
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'isSuccess' => true,
                    'status' => 200,
                    'error' => $e,
                    'message' => 'No se encontro registro con id ' . $id
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'status' => 200,
                'objects' => $data
            ]
        );
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
        try {
            ClockRecording::findOrFail($id)->update($request);
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => false,
                    'status' => 400,
                    'error' => $e,
                    'message' => 'Ha ocurrido un error'
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'isSuccess' => true,
                    'status' => 200,
                    'error' => $e,
                    'message' => 'No se encontro registro con id ' . $id
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'status' => 200,
                'message' => 'El registro ha sido actualizado'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ClockRecording::findOrFail($id)->delete();
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => false,
                    'status' => 400,
                    'error' => $e,
                    'message' => 'Ha ocurrido un error'
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'isSuccess' => true,
                    'status' => 200,
                    'error' => $e,
                    'message' => 'No se encontro registro con id ' . $id
                ]
            );
        }

        return response()->json(
            [
                'isSuccess' => true,
                'status' => 200,
                'message' => 'El registro ha sido eliminado'
            ]
        );
    }
}
