<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "member index";
        // return dd($data);

        $data = Member::all();

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
        $data = Member::create([
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->nomor_whatsapp,
        ]);

        return response()->json([
            'status' => 201,
            'status_message' => 'success',
            'text_message' => 'Data berhasil disimpan',
            'products' => $data,
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
        $member = Member::find($id);

        if (!$member) {
            return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
        }

        return response()->json($member);
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
        Member::where('id',$id)->update([
            // 'nama' => $request->nama,
            // 'slug' => Str::slug($request->nama),
            // 'deskripsi' => $request->deskripsi,
            // 'nama' => $request->nama,
            // 'slug' => Str::slug($request->nama),
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->nomor_whatsapp,
        ]);

        $data = [
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->nomor_whatsapp,
        ];

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'products' => $data,
        ], 200);
        // $member = Member::find($id);

        // if (!$member) {
        //     return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
        // }
    
        // $request->validate([
        //     'nama' => 'required|string',
        //     'nomor_whatsapp' => 'required|string',
        //     // 'email' => 'required|email|unique:members,email,' . $id,
        //     // Tambahkan validasi lain sesuai kebutuhan Anda.
        // ]);
    
        // $member->nama = $request->input('nama');
        // $member->nomor_whatsapp = $request->input('nomor_whatsapp');
        // // Update kolom-kolom lain sesuai kebutuhan Anda.
        // $member->save();
    
        // return response()->json(['message' => 'Anggota berhasil diupdate', 'data' => $member]);
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
        $member = Member::findOrFail($id);
        $member->delete();
          
        // return response()->json([
        //     'message' => 'Data berhasil dihapus'
        // ], 204);

        return response()->json([
            'status' => 204,
            'status_message' => 'success',
            'text_message' => 'Data Member Berhasil Ditampilkan',
            'data' => $member,
        ], 204);
    }
}
