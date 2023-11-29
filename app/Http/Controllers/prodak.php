<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class prodak extends Controller
{
    public function home()
    {
        $prodak = DB::table('prodak')->get();
        return view('home', ['prodak' => $prodak]);
    }

    public function index()
    {
        $prodak = DB::table('prodak')->get();
        return view('prodak', ['prodak' => $prodak]);
    }

    public function input()
    {
        return view('tambahprinter');
    }

    public function storeinput(Request $request)
    {
        if($request->file('gambar')){
            $imageName = time() .'.'.$request->file('gambar')->extension();
            $request->file("gambar")->move(public_path('assets/img'),$imageName);
        // insert data ke table tbprodak
        DB::table('prodak')->insert([
            'kode' => $request->id,
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'gambar' => $imageName,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
    }

        // alihkan halaman ke route prodak
        Session::flash('message', 'Input Berhasil.');
        return redirect('/prodak/tampil');
    }

    public function update($kode)
    {
        // mengambil data prodak berdasarkan kode yang dipilih
        $kode = DB::table('prodak')->where('kode', $kode)->get();
        // passing data prodak yang didapat ke view edit.blade.php
        return redirect('/prodak/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data prodak

        DB::table('prodak')->where('kode', $request->kode)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        // alihkan halaman ke halaman prodak
        return redirect('/prodak/tampil');
    }

    public function delete($kode)
    {
        // mengambil data prodak berdasarkan kode yang dipilih
        DB::table('prodak')->where('kode', $kode)->delete();
        // passing data prodak yang didapat ke view edit.blade.php
        return redirect('/prodak/tampil');
    }
}