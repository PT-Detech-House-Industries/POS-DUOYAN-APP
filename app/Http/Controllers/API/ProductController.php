<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productData = Product::all();

        $customData = $productData->map(function ($product) {
          return [
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
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
        // Validasi input sesuai kebutuhan Anda
        $validatedData = $request->validate([
          'name' => 'required|string',
          'description' => 'nullable|string',
          'price' => 'required|numeric',
          // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);

        // Buat produk baru berdasarkan data yang telah divalidasi
        $product = Product::create($validatedData);
        
        // $data = Product::create([
        //   'nama' => $request->nama,
        // ]);

        return response()->json([
          'status' => 201,
          'status_message' => 'success',
          'text_message' => 'Data berhasil disimpan',
          'data' => $product,
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
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 404, // Status 404 menunjukkan bahwa produk tidak ditemukan
                'status_message' => 'error',
                'text_message' => 'Produk tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Detail Produk Berhasil Ditampilkan',
            'data' => $product,
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
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 404, // Status 404 menunjukkan bahwa produk tidak ditemukan
                'status_message' => 'error',
                'text_message' => 'Produk tidak ditemukan',
            ], 404);
        }

        // Validasi input sesuai kebutuhan Anda
        $validatedData = $request->validate([
            'name' => 'string',
            'description' => 'nullable|string',
            'price' => 'numeric',
            // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);

        // Perbarui data produk berdasarkan data yang telah divalidasi
        $product->update($validatedData);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Produk Berhasil Diperbarui',
            'data' => $product, // Mengembalikan data produk yang baru saja diperbarui
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
      $product = Product::find($id);

      if (!$product) {
          return response()->json([
              'status' => 404, // Status 404 menunjukkan bahwa produk tidak ditemukan
              'status_message' => 'error',
              'text_message' => 'Produk tidak ditemukan',
          ], 404);
      }

      // Hapus produk
      $product->delete();

      return response()->json([
          'status' => 200,
          'status_message' => 'success',
          'text_message' => 'Produk Berhasil Dihapus',
      ], 200);
    }
}
