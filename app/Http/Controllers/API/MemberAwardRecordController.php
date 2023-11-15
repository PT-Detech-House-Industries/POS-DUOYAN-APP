<?php

namespace App\Http\Controllers\API;

use App\Models\MemberAwardRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberAwardRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = MemberAwardRecord::all();

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
            // 'data' => $data,
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
            'text_message' => 'Data Member Award Berhasil Ditampilkan',
            // 'data' => $memberAward,
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
            'text_message' => 'Data Member Award Berhasil Dihapus',
        ], 200);
    }
}
