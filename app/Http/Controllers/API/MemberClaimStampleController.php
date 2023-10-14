<?php

namespace App\Http\Controllers\API;

use App\Models\MemberClaimStample;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberClaimStampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'percobaan';
        $data = MemberClaimStample::all();

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
        $data = MemberClaimStample::create([
          'nama' => $request->nama,
        ]);

        return response()->json([
          'status' => 201,
          'status_message' => 'success',
          'text_message' => 'Data berhasil disimpan',
          'data' => $data,
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
    }
}
