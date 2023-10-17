<?php

namespace App\Http\Controllers\API;

use App\Models\MemberPurchasing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberPurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'member purchasing';
        // $data = MemberPurchasing::all();
        $memberPurchases = MemberPurchasing::all();

        $customData = $memberPurchases->map(function ($purchase) {
          return [
            'id' => $purchase->id,
            'member_id' => $purchase->member->name,
            'product_id' => $purchase->product->name,
            'invoice' => $purchase->invoice,
            'quantity_purchased' => $purchase->quantity_purchased,
            'total_price' => $purchase->total_price,
            'purchase_date' => $purchase->purchase_date,
            'status' => $purchase->status,
            // Tambahkan field tambahan sesuai kebutuhan Anda
          ];
        });

        return response()->json([
          'status' => 200,
          'status_message' => 'success',
          'text_message' => 'Data Member Berhasil Ditampilkan',
          'data' => $customData,
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
        $data = $request->validate([
          'member_id' => 'required|integer',
          'product_id' => 'required|integer',
          'invoice' => 'required|string',
          // 'quantity_purchased' => 'integer|nullable',
          // 'total_price' => 'numeric|nullable',
          // 'purchase_date' => 'date|nullable',
          // 'status' => 'in:paid,unpaid',
          // Anda dapat menambahkan validasi tambahan sesuai kebutuhan Anda
        ]);
  
        $memberPurchase = MemberPurchasing::create($data);

        return response()->json([
          'status' => 201,
          'status_message' => 'success',
          'text_message' => 'Data berhasil disimpan',
          'data' => $memberPurchase ,
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
