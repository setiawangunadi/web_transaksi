<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtBarang = Barang::all();
        $dtDetailTransaksi = DetailTransaksi::where('id_transaksi', null)->get();
        return view('penjualan.penjualan',compact('dtBarang', 'dtDetailTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtBarang = Barang::all();
        $dtTransaksi = Transaksi::all();
        $dtDetailTransaksi = DetailTransaksi::all();    

        return view('penjualan.penjualan',compact('dtBarang', 'dtTransaksi', 'dtDetailTransaksi'))->with('toast_success','Barang Berhasil Ditambah!');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $detailTransaksi = DetailTransaksi::where('id_transaksi', null)->get();
        $input['total_pembayaran'] = DetailTransaksi::where('id_transaksi', NULL)->sum('jumlah_penjualan');

        foreach($detailTransaksi as $transaksi) {
            $barang = Barang::find($transaksi->id_barang);
            Barang::find($transaksi->id_barang)->update([
                'stok_barang' => $barang->stok_barang - $transaksi->qty
            ]);
        }

        $transaksi = Transaksi::create($input);

        DetailTransaksi::where('id_transaksi', null)->update([
            'id_transaksi' => $transaksi->id_transaksi
        ]);

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        //
    }

    public function detailPenjualanStore(Request $request)
    {
        $input = $request->all();
        $input['jumlah_penjualan'] = $request->qty * $request->harga_barang;
        DetailTransaksi::create($input);

        return redirect()->back();
    }

    public function detailPenjualanDestroy($id)
    {
        DetailTransaksi::find($id)->delete();
        return redirect()->back();
    }


}
