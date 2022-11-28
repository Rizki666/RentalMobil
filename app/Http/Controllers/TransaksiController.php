<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return $transaksi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new transaksi();
        $transaksi -> id_mobil = $request -> input('id_mobil');
        $transaksi -> id_user = $request -> input("id_user");
        $transaksi -> nama_pemesan = $request -> input("nama_pemesan");
        $transaksi -> harga = $request -> input("harga");
        $transaksi -> merek = $request -> input("merek");
        $transaksi -> tanggal_pembayaran = $request -> input("tanggal_pembayaran");
        $transaksi -> metode_pembayaran = $request -> input("metode_pembayaran");
        $transaksi -> tanggal_peminjaman = $request -> input("tanggal_peminjaman");
        $transaksi -> tanggal_pengembalian = $request -> input("tanggal_pengembalian");
        $transaksi -> no_hp_admin = $request -> input("no_hp_admin");
        $transaksi -> no_hp_pemesan = $request -> input("no_hp_pemesan");
        $transaksi -> save();

        return response() -> json([
            'success' => 201,
            'message' => 'Data berhasil tersimpan',
            'data' => $transaksi
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
        $transaksi = transaksi::find($id);
        if($transaksi){
            return response() -> json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response() -> json([
                'status' => 404,
                'message' => "id atas" . $id . "tidak ditemukan"
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $transaksi = transaksi::find($id);
        if($transaksi){
            $transaksi -> id_mobil = $request -> id_mobil ? $request -> id_mobil : $transaksi -> id_mobil;
            $transaksi -> id_user = $request -> id_user ? $request -> id_user : $transaksi -> id_user;
            $transaksi -> nama_pemesan = $request -> nama_pemesan ? $request -> nama_pemesan : $transaksi -> nama_pemesan;
            $transaksi -> harga = $request -> harga ? $request -> harga : $transaksi -> harga;
            $transaksi -> merek = $request -> merek ? $request -> merek : $transaksi -> merek;
            $transaksi -> tanggal_pembayaran = $request -> tanggal_pembayaran ? $request -> tanggal_pembayaran : $transaksi -> tanggal_pembayaran;
            $transaksi -> metode_pembayaran = $request -> metode_pembayaran ? $request -> metode_pembayaran : $transaksi -> metode_pembayaran;
            $transaksi -> tanggal_peminjaman = $request -> tanggal_peminjaman ? $request -> tanggal_peminjaman : $transaksi -> tanggal_peminjaman;
            $transaksi -> tanggal_pengembalian = $request -> tanggal_pengembalian ? $request -> tanggal_pengembalian : $transaksi -> tanggal_pengembalian;
            $transaksi -> no_hp_admin = $request -> no_hp_admin ? $request -> no_hp_admin : $transaksi -> no_hp_admin;
            $transaksi -> no_hp_pemesan = $request -> no_hp_pemesan ? $request -> no_hp_pemesan : $transaksi -> no_hp_pemesan;
            $transaksi -> save();
            return response() -> json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response() -> json([
                "status" => 404,
                "message" => $id . "tidak ditemukan"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::where('id', $id) -> first();
        if($transaksi){
            $transaksi -> delete();
            return response() -> json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response() -> json([
                'status' => 404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
