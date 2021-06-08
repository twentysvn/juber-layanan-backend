<?php

namespace App\Http\Controllers;

use App\Helpers\RequestChecker;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $merchant = Merchant::all();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
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
            $dataTable = RequestChecker::add('nama_toko', 'nama_toko', $request, $dataTable);
            $dataTable = RequestChecker::add('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('gender', 'gender', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tanggal_lahir', 'tanggal_lahir', $request, $dataTable);
            $dataTable = RequestChecker::add('profile_img', 'profile_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('cover_img', 'cover_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('profile', 'profile', $request, $dataTable);
            $dataTable = RequestChecker::add('pin', 'pin', $request, $dataTable);
            $dataTable = RequestChecker::add('no_hp', 'no_hp', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('token', 'token', $request, $dataTable);
            $merchant = Merchant::create($dataTable);
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $merchant = Merchant::findOrFail($id)->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $merchant = Merchant::where('idrs', $idrs)->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('nama_toko', 'nama_toko', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('gender', 'gender', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tanggal_lahir', 'tanggal_lahir', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('profile_img', 'profile_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('cover_img', 'cover_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('profile', 'profile', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('pin', 'pin', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('no_hp', 'no_hp', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('token', 'token', $request, $dataTable);
            $merchant = Merchant::findOrFail($id);
            $merchant->update($dataTable);
            return ResponseFormatter::success($merchant, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    public function updatebyidrs($idrs, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('nama_toko', 'nama_toko', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('gender', 'gender', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tanggal_lahir', 'tanggal_lahir', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('profile_img', 'profile_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('cover_img', 'cover_img', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('profile', 'profile', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('pin', 'pin', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('no_hp', 'no_hp', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('token', 'token', $request, $dataTable);
            $merchant = Merchant::where('idrs', $idrs);
            $merchant->update($dataTable);
            return ResponseFormatter::success($merchant, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $merchant = Merchant::findOrFail($id);
            $merchant->delete();
            return ResponseFormatter::success($merchant, 'Berhasil menghapus data merhcant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(null, $th->getMessage(), 500);
        }
    }
}
