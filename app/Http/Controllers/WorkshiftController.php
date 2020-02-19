<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkShift;
use App\Http\Resources\WorkShift as WorkShiftResource;
use App\Http\Resources\WorkShiftCollection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WorkShiftController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = new WorkShiftCollection(WorkShift::all());
        } catch (Exception $e) {
            return  response()->json(
                [
                    'isSuccess' => true,
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
            $data = WorkShift::creat($request->all());
        } catch (Exception $e) {
            return response()->json(
                [
                    'isSuccess' => true,
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
            $data = new WorkShiftResource(WorkShift::findOrFail($id));
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
            WorkShift::findOrFail($id)->update($request);
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
            WorkShift::findOrFail($id)->delete();
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
