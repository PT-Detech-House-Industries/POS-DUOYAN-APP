<?php

namespace App\Http\Controllers\API;

use App\Models\MemberClaimStample;
use App\Models\MemberPurchasing;

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
        // $datas = $request->validate([
        //   'member_id' => 'required|integer',
        //   'product_id' => 'required|integer',
        //   'invoice' => 'required|string',
        //   'quantity_purchased' => 'integer|nullable',
        //   // 'total_price' => 'numeric|nullable',
        //   'purchase_date' => 'date|nullable',
        //   // 'status' => 'in:paid,unpaid',
        //   // Anda dapat menambahkan validasi tambahan sesuai kebutuhan Anda
        // ]);

        // Pengecekan apakah status claim sudah ada
        $claim = MemberClaimStample::find($request->member_claim_stample_id);

        if (!$claim) {
          // Respon jika member_claim_stample_id tidak ditemukan
          return response()->json(['message' => 'ID Member Claim Stample tidak ditemukan.'], 404);
        }

        if ($claim && $claim->status_claim === 'sudah') {
            // Respon jika status claim sudah ada
            return response()->json(['message' => 'Maaf, claim sudah ditukar.'], 400);
        }

        $data = MemberPurchasing::create([
          'member_id' => $request->member_id,
          'product_id' => $request->product_id,
          'invoice' => 'INV001',
          'quantity_purchased' => '1',
          'total_price' => '0',
          'purchase_date' => $request->claim_date,
          'purchase_type' => 'member_claim',
        ]);

        MemberClaimStample::where('id', $request->member_claim_stample_id)->update([
          // Daftar kolom yang ingin Anda perbarui
          'product_id' => $request->product_id,
          'claim_date' => $request->claim_date,
          'status_claim' => 'sudah',
          // Tambahkan kolom lain sesuai kebutuhan
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
