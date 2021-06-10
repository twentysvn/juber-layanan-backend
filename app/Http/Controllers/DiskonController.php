<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;
use App\Helpers\RequestChecker;
use App\Helpers\ResponseFormatter;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $selectedRows = 'merchant:id,idrs,nama_toko,toko_foodish,toko_layanan';
            $diskon = Diskon::with($selectedRows)->get();
            return ResponseFormatter::success($diskon, 'Berhasil mengambil data diskon');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
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
        try {
            $dataTable = [];
            $dataTable = RequestChecker::add('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::add('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::add('waktu_mulai', 'waktu_mulai', $request, $dataTable);
            $dataTable = RequestChecker::add('waktu_selesai', 'waktu_selesai', $request, $dataTable);
            $dataTable = RequestChecker::add('tipe_diskon', 'tipe_diskon', $request, $dataTable);
            $dataTable = RequestChecker::add('diskon_deksripsi', 'diskon_deksripsi', $request, $dataTable);
            $dataTable = RequestChecker::add('min_qty', 'min_qty', $request, $dataTable);
            $dataTable = RequestChecker::add('diskon_nilai', 'diskon_nilai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('batas_pembelian', 'batas_pembelian', $request, $dataTable);
            $dataTable = RequestChecker::add('produk', 'produk', $request, $dataTable);
            $diskon = Diskon::create($dataTable);
            return ResponseFormatter::success($diskon, 'Berhasil menyimpan data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $diskon = Diskon::findOrFail($id)->get();
            return ResponseFormatter::success($diskon, 'Berhasil mengambil data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $diskon = Diskon::where('idrs', $idrs)->get();
            return ResponseFormatter::success($diskon, 'Berhasil mengambil data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function edit(Diskon $diskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('waktu_mulai', 'waktu_mulai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('waktu_selesai', 'waktu_selesai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tipe_diskon', 'tipe_diskon', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('diskon_deksripsi', 'diskon_deksripsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('min_qty', 'min_qty', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('diskon_nilai', 'diskon_nilai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('batas_pembelian', 'batas_pembelian', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('produk', 'produk', $request, $dataTable);
            $diskon = Diskon::findOrFail($id);
            $diskon->update($dataTable);
            return ResponseFormatter::success($diskon, 'Berhasil menyimpan data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $diskon = Diskon::findOrFail($id);
            $diskon->delete();
            return ResponseFormatter::success($diskon, 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
