<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class printer extends Controller
{
    public function home()
    {
        $printer = DB::table('printer')->get();
        return view('home', ['printer' => $printer]);
    }

    public function index()
    {
        $printer = DB::table('printer')->get();
        return view('printer', ['printer' => $printer]);
    }

    public function input()
    {
        return view('tambahprinter');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        DB::table('produk')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'harga' => $request->harga,
            'user_id' => $request->user_id,

    
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/produk/tampil');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $id = DB::table('printer')->where('id', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/printer/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('printer')->where('id', $request->id)->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'harga' => $request->harga,
            'user_id' => $request->user_id,
            'gambar' => $request->gambar
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/printer/tampil');
    }

    public function delete($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('printer')->where('id', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/printer/tampil');
    }
}