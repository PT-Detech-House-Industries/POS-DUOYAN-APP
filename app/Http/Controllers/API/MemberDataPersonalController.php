<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use App\Models\MemberDataPersonal;
use App\Models\MemberAwardRecord;
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
        $data = MemberDataPersonal::create([
          'member_id' => $request->member_id,
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

    public function check(Request $request)
    {
        $noWa = $request->input('nomor_whatsapp');

        // Member::where();
        // MemberDataPersonal::findOrFail($noWa);
        $member = Member::where('whatsapp_number', $noWa)->first();
        $newData = MemberAwardRecord::where('member_id', $member->id)->first();
        
        if ($newData) {
            $data = [];

            $data[] = [
                'id' => $newData->id,
                'nama' => $newData->member->name,
                'jenis_member' => $newData->award->name,
                'tanggal_bergabung' => 'Belum Ada',
                'masa_berlaku' => 'Belum Ada',
                'point_member' => $newData->award->point_minimum,
                // 'id' => $dt->id,
                // 'code' => $dt->service_code,
                // 'sort' => $dt->service_sort,
                // 'kind' => $dt->service_kind,
                // 'name' => $dt->service_name,
                // 'duration' => $dt->service_duration,
                // 'service' => $dt->service_service,
                // 'description' => $dt->service_description,
                // 'point' => $dt->service_point,
            ];  

            $response = [
                'status' => 201,
                'status_message' => 'success',
                'text_message' => 'Data berhasil disimpan',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => 400,
                'status_message' => 'error',
                'text_message' => 'Nomor WA tidak ditemukan dalam permintaan.',
                'data' => null,
            ];
        }

        return response()->json($response, $response['status']);
    }
}
