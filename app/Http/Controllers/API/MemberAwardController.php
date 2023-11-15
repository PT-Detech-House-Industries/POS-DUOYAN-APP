<?php

namespace App\Http\Controllers\API;

use App\Models\MemberAward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = MemberAward::all();

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
        $data = MemberAward::create([
            'name' => $request->name,
            'point_minimum' => $request->point_minimum,
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
        $memberAward = MemberAward::find($id);

        if (!$memberAward) {
            return response()->json([
                'status' => 404,
                'status_message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Award Berhasil Ditampilkan',
            'data' => $memberAward,
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
        // Validasi input terlebih dahulu jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'point_minimum' => 'required|integer',
        ]);

        $memberAward = MemberAward::find($id);

        if (!$memberAward) {
            return response()->json([
                'status' => 404,
                'status_message' => 'Data tidak ditemukan',
            ], 404);
        }

        // Perbarui data berdasarkan input yang diberikan
        $memberAward->nama = $request->nama;
        $memberAward->point_minimal = $request->point_minimal;
        $memberAward->save();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Award Berhasil Diperbarui',
            'data' => $memberAward,
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
        $memberAward = MemberAward::find($id);

        if (!$memberAward) {
            return response()->json([
                'status' => 404,
                'status_message' => 'Data tidak ditemukan',
            ], 404);
        }

        // Hapus data berdasarkan ID yang diberikan
        $memberAward->delete();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Member Award Berhasil Dihapus',
        ], 200);
    }
}
