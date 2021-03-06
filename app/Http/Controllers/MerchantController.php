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
            $merchant = Merchant::with('alamat')->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function foodish()
    {
        try {
            $merchant = Merchant::where('toko_foodish', '1')->with('alamat')->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function layanan()
    {
        try {
            $merchant = Merchant::where('toko_layanan', '1')->with('alamat')->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function layananidrs($idrs)
    {
        try {
            $merchant = Merchant::where('idrs', $idrs)->where('toko_layanan', '1')->with('alamat')->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function foodishidrs($idrs)
    {
        try {
            $merchant = Merchant::where('idrs', $idrs)->where('toko_foodish', '1')->with('alamat')->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function changestatus(Request $request)
    {
        try {
            $idrs = $request->idrs;
            $status = $request->status;
            $merchant = Merchant::where('idrs', $idrs)->update(["status" => $status]);
            if ($merchant > 0) {
                $merchant = ["IDRS" => $idrs, "Sukses" => true];
            } else {
                $merchant = ["IDRS" => $idrs, "Sukses" => false];
                return ResponseFormatter::success($merchant, 'Gagal mengubah status toko, IDRS tidak ditemukan');
            }
            return ResponseFormatter::success($merchant, 'Berhasil mengubah status toko');
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
            $dataTable = RequestChecker::checkifexist('id_alamat', 'id_alamat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_foodish', 'toko_foodish', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_layanan', 'toko_layanan', $request, $dataTable);
            $merchant = Merchant::create($dataTable);
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
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
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $selectedRows = 'alamat:id,nama,no_hp,id_provinsi,provinsi,id_kota_kab,kota_kab,id_kecamatan,kecamatan,kode_pos,jalan,rincian,lat,lon';
            $merchant = Merchant::where('idrs', $idrs)->with($selectedRows)->get();
            return ResponseFormatter::success($merchant, 'Berhasil mengambil data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
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
            $dataTable = RequestChecker::checkifexist('id_alamat', 'id_alamat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_foodish', 'toko_foodish', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_layanan', 'toko_layanan', $request, $dataTable);
            $merchant = Merchant::findOrFail($id);
            $merchant->update($dataTable);
            return ResponseFormatter::success($merchant, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
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
            $dataTable = RequestChecker::checkifexist('id_alamat', 'id_alamat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_foodish', 'toko_foodish', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('toko_layanan', 'toko_layanan', $request, $dataTable);
            $selectedRows = 'alamat:id,nama,no_hp,id_provinsi,provinsi,id_kota_kab,kota_kab,id_kecamatan,kecamatan,kode_pos,jalan,rincian,lat,lon';
            $merchant = Merchant::where('idrs', $idrs);
            $merchant->update($dataTable);
            $result =  Merchant::where('idrs', $idrs)->with($selectedRows)->get();
            return ResponseFormatter::success($result, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
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
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
