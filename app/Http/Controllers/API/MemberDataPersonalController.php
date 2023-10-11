<?php

namespace App\Http\Controllers\API;

use App\Models\MemberDataPersonal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberDataPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'data personal';
        $data = MemberDataPersonal::all();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Berhasil Ditampilkan',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        return response()->json([
            'status' => 201,
            'status_message' => 'success',
            'text_message' => 'Data berhasil disimpan',
            // 'products' => $data,
        ], 201);
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

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Berhasil Ditampilkan',
            // 'data' => $data,
        ], 200);
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
        //

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Berhasil Ditampilkan',
            // 'data' => $data,
        ], 200);
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

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Berhasil Ditampilkan',
            // 'data' => $data,
        ], 200);
    }
}
