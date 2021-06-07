<?php

namespace App\Http\Controllers;

use App\Helpers\RequestChecker;
use App\Helpers\ResponseFormatter;
use App\Models\AlamatMerchant;
use Illuminate\Http\Request;

class AlamatMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $alamat = AlamatMerchant::all();
            return ResponseFormatter::success($alamat, 'Data Berhasil Diambil');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
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
            $dataTable = RequestChecker::add('mc_id', 'mc_id', $request, $dataTable);
            $dataTable = RequestChecker::add('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::add('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::add('no_hp', 'no_hp', $request, $dataTable);
            $dataTable = RequestChecker::add('id_provinsi', 'id_provinsi', $request, $dataTable);
            $dataTable = RequestChecker::add('provinsi', 'provinsi', $request, $dataTable);
            $dataTable = RequestChecker::add('id_kota_kab', 'id_kota_kab', $request, $dataTable);
            $dataTable = RequestChecker::add('kota_kab', 'kota_kab', $request, $dataTable);
            $dataTable = RequestChecker::add('id_kecamatan', 'id_kecamatan', $request, $dataTable);
            $dataTable = RequestChecker::add('kecamatan', 'kecamatan', $request, $dataTable);
            $dataTable = RequestChecker::add('kode_pos', 'kode_pos', $request, $dataTable);
            $dataTable = RequestChecker::add('jalan', 'jalan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('rincian', 'rincian', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('lat', 'lat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('lon', 'lon', $request, $dataTable);
            $alamat = AlamatMerchant::create($dataTable);
            return ResponseFormatter::success($alamat, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $alamat = AlamatMerchant::findOrFail($id)->get();
            return ResponseFormatter::success($alamat, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $alamat = AlamatMerchant::where('idrs', $idrs)->get();
            return ResponseFormatter::success($alamat, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function edit(AlamatMerchant $alamatMerchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('mc_id', 'mc_id', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('no_hp', 'no_hp', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_provinsi', 'id_provinsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('provinsi', 'provinsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_kota_kab', 'id_kota_kab', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kota_kab', 'kota_kab', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_kecamatan', 'id_kecamatan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kecamatan', 'kecamatan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kode_pos', 'kode_pos', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('jalan', 'jalan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('rincian', 'rincian', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('lat', 'lat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('lon', 'lon', $request, $dataTable);
            $alamat = AlamatMerchant::findOrFail($id);
            $alamat->update($dataTable);
            return ResponseFormatter::success($alamat, 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $alamat = AlamatMerchant::findOrFail($id);
            $alamat->delete();
            return ResponseFormatter::success($alamat, 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }
}
