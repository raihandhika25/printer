<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class transaksiCon extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'Guest') {
            $transaksi = DB::table('transaksi')->get();
            return view('transaksi', ['transaksi' => $transaksi]);
        } else {
            $transaksi = DB::table('transaksi')->where('kode_pembeli', Auth::user()->id)->get();
            return view('transaksi', ['transaksi' => $transaksi]);
        }
    }

    public function input()
    {
        return view('tambahtransaksi');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbtransaksi
        DB::table('transaksi')->insert([
            'kode_produk' => $request->kodeproduk,
            'banyak' => $request->banyak,
            'bayar' => $request->harga * $request->banyak,
            'kode_pembeli' => Auth::user()->id,
            'status' => 'verifikasi'
        ]);
        // alihkan halaman ke route transaksi
        Session::flash('message', 'Input Berhasil.');
        return redirect('/transaksi/tampil');
    }

    public function update($kode)
    {
        // mengambil data transaksi berdasarkan kode$kode yang dipilih
        $transaksi = DB::table('transaksi')->where('kode_transaksi', $kode)->get();
        // passing data transaksi yang dkode$kodeapat ke view edit.blade.php
        return redirect('/transaksi/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data transaksi

        DB::table('transaksi')->where('kode_transaksi', $request->kode_transaksi)->update([
            'status' => $request->status
        ]);

        // alihkan halaman ke halaman transaksi
        return redirect('/transaksi/tampil');
    }

    public function delete($kode)
    {
        // mengambil data transaksi berdasarkan kode$kode yang dipilih
        DB::table('transaksi')->where('kode_transaksi', $kode)->delete();
        // passing data transaksi yang dkode$kodeapat ke view edit.blade.php
        return redirect('/transaksi/tampil');
    }
}
