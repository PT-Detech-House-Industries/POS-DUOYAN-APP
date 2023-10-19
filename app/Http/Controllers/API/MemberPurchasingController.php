<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\MemberStample;
use App\Models\MemberClaimStample;
use App\Models\MemberPurchasing;
use App\Models\MemberPurchasingDetail;

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
          'quantity_purchased' => 'integer|nullable',
          // 'total_price' => 'numeric|nullable',
          'purchase_date' => 'date|nullable',
          // 'status' => 'in:paid,unpaid',
          // Anda dapat menambahkan validasi tambahan sesuai kebutuhan Anda
        ]);

        // Ambil harga produk dari database
        $hargaProduk = Product::where('id', $data['product_id'])->value('price');

        // Hitung total harga
        $totalHarga = $hargaProduk * $data['quantity_purchased'];

        // Tambahkan total harga ke dalam data
        $data['total_price'] = $totalHarga;
  
        $memberPurchase = MemberPurchasing::create($data);

        MemberPurchasingDetail::create([
          'member_purchasing_id' => $memberPurchase->id,
          'product_id' => $data['product_id'],
          'quantity' => $data['quantity_purchased'],
          'price' => $hargaProduk,
        ]);
        
        // Menggunakan loop untuk membuat catatan MemberStample berdasarkan quantity_purchased
        for ($i = 0; $i < $data['quantity_purchased']; $i++) {
          MemberStample::create([
            'member_id' => $memberPurchase->member_id,
            'member_purchasing_id' => $memberPurchase->id,
            // 'purchase_date' => $data['purchase_date'],
            // 'purchase_card_number' => $data['purchase_card_number'],
            // 'stample_card' => $data['stample_card'],
          ]);
        }

        // Menghitung jumlah MemberStample
        $stampleCount = MemberStample::where('member_id', $data['member_id'])
          ->whereNull('member_claim_stample_id')
          ->count();

        // Membuat klaim stample berdasarkan kelipatan 10
        if ($stampleCount >= 10) {
          $claimCount = floor($stampleCount / 10); // Menghitung berapa banyak klaim yang harus dibuat
          for ($i = 0; $i < $claimCount; $i++) {
            // if(!empty($data['member_id'])) {

            $firstRow = MemberClaimStample::first();

            if ($firstRow === null) {
                // Tabel kosong
                $memberClaimStample = MemberClaimStample::create([
                  'member_id' => $data['member_id'],
                  'status_claim' => 'belum',
                  'periode_claim' => '1', // ditambah satu jika belum
                ]);
                //
            } else {
                //
                $latestClaim = MemberClaimStample::where('member_id', $data['member_id'])
                  ->latest('created_at') // Mengurutkan berdasarkan tanggal pembuatan terbaru
                  ->first();

                $addPeriode = $latestClaim->periode_claim + 1;
                // Tabel tidak kosong
                $memberClaimStample = MemberClaimStample::create([
                  'member_id' => $data['member_id'],
                  'status_claim' => 'belum',
                  'periode_claim' => $addPeriode, // ditambah satu jika belum
                ]);
            }

            // Mendapatkan ID dari MemberClaimStample yang baru saja dibuat
            $claimStampleId = $memberClaimStample->id;

            // Mengupdate MemberStample yang sesuai dengan ID MemberClaimStample
            MemberStample::where('member_id', $data['member_id'])
              ->whereNull('member_claim_stample_id') // Hanya yang belum terhubung ke klaim
              ->take(10) // Ambil 10 MemberStample
              ->update(['member_claim_stample_id' => $claimStampleId]);
          }
        }

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
