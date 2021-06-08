<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Helpers\RequestChecker;
use App\Helpers\ResponseFormatter;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $rekening = Rekening::all();
            return ResponseFormatter::success($rekening, 'Berhasil mengambil data rekening');
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
            $dataTable = RequestChecker::add('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::add('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::add('no_rek', 'no_rek', $request, $dataTable);
            $dataTable = RequestChecker::add('kode_bank', 'kode_bank', $request, $dataTable);
            $dataTable = RequestChecker::add('nama_bank', 'nama_bank', $request, $dataTable);
            $dataTable = RequestChecker::add('nama_detail_bank', 'nama_detail_bank', $request, $dataTable);
            $dataTable = RequestChecker::add('cabang', 'cabang', $request, $dataTable);
            $dataTable = RequestChecker::add('kota', 'kota', $request, $dataTable);
            $rekening = Rekening::create($dataTable);
            return ResponseFormatter::success($rekening, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rekening = Rekening::findOrFail($id)->get();
            return ResponseFormatter::success($rekening, 'Berhasil mengambil data rekening');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $rekening = Rekening::where('idrs', $idrs)->get();
            return ResponseFormatter::success($rekening, 'Berhasil mengambil data rekening');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('no_rek', 'no_rek', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kode_bank', 'kode_bank', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama_bank', 'nama_bank', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama_detail_bank', 'nama_detail_bank', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('cabang', 'cabang', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kota', 'kota', $request, $dataTable);
            $rekening = Rekening::findOrFail($id);
            $rekening->update($dataTable);
            return ResponseFormatter::success($rekening, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $rekening = Rekening::findOrFail($id);
            $rekening->delete();
            return ResponseFormatter::success($rekening, 'Berhasil menghapus data rekening');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
