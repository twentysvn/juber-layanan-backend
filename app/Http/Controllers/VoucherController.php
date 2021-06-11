<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Helpers\RequestChecker;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
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
            $voucher = Voucher::with($selectedRows)->get();
            return ResponseFormatter::success($voucher, 'Berhasil mengambil data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function alltoko()
    {
        try {
            $selectedRows = 'merchant:id,idrs,nama_toko,toko_foodish,toko_layanan';
            $voucher = Voucher::where('tipe', 1)->with($selectedRows)->get();
            return ResponseFormatter::success($voucher, 'Berhasil mengambil data voucher tipe : toko');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function allproduk()
    {
        try {
            $selectedRows = 'merchant:id,idrs,nama_toko,toko_foodish,toko_layanan';
            $voucher = Voucher::where('tipe', 2)->with($selectedRows)->get();
            return ResponseFormatter::success($voucher, 'Berhasil mengambil data voucher tipe : produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function getproduk(Request $request)
    {
        try {
            $kode = $request->kode;
            $voucher = Voucher::where('kode', $kode)->get();
            if (count($voucher) > 0) {
                $produk = $voucher[0]->produk;
            } else {
                return ResponseFormatter::error([], 'Tidak ada produk', 500);
            }
            $produk = explode("#", $produk);
            $produk = array_filter($produk);
            $whereCondition = '';
            for ($i = 0; $i < count($produk); $i++) {
                $whereCondition = $whereCondition . 'id=' . $produk[$i];
                if ($i != count($produk) - 1) {
                    $whereCondition = $whereCondition . ' OR ';
                }
            }
            $query = 'select * from foodish_produk where ' . $whereCondition;
            $selected = DB::select($query);
            return ResponseFormatter::success($selected, 'Berhasil mengambil ' . count($selected) . ' data');
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
            $dataTable = RequestChecker::add('tipe', 'tipe', $request, $dataTable);
            $dataTable = RequestChecker::add('tipe_deskripsi', 'tipe_deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::add('kode', 'kode', $request, $dataTable);
            $dataTable = RequestChecker::add('tgl_mulai', 'tgl_mulai', $request, $dataTable);
            $dataTable = RequestChecker::add('tgl_selesai', 'tgl_selesai', $request, $dataTable);
            $dataTable = RequestChecker::add('kuota_klaim', 'kuota_klaim', $request, $dataTable);
            $dataTable = RequestChecker::add('kuota_pemakaian', 'kuota_pemakaian', $request, $dataTable);
            $dataTable = RequestChecker::add('jenis_diskon', 'jenis_diskon', $request, $dataTable);
            $dataTable = RequestChecker::add('jenis_diskon_deskripsi', 'jenis_diskon_deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::add('nilai_diskon', 'nilai_diskon', $request, $dataTable);
            $dataTable = RequestChecker::add('diskon_batas', 'diskon_batas', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('diskon_batas_nilai', 'diskon_batas_nilai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('penempatan', 'penempatan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('produk', 'produk', $request, $dataTable);
            $voucher = Voucher::create($dataTable);
            return ResponseFormatter::success($voucher, 'Berhasil menyimpan data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $voucher = Voucher::findOrFail($id)->get();
            return ResponseFormatter::success($voucher, 'Berhasil mengambil data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $selectedRows = 'merchant:id,idrs,nama_toko,toko_foodish,toko_layanan';
            $voucher = Voucher::where('idrs', $idrs)->with($selectedRows)->get();
            return ResponseFormatter::success($voucher, 'Berhasil mengambil data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tipe', 'tipe', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tipe_deskripsi', 'tipe_deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kode', 'kode', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tgl_mulai', 'tgl_mulai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('tgl_selesai', 'tgl_selesai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kuota_klaim', 'kuota_klaim', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kuota_pemakaian', 'kuota_pemakaian', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('jenis_diskon', 'jenis_diskon', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('jenis_diskon_deskripsi', 'jenis_diskon_deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nilai_diskon', 'nilai_diskon', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('diskon_batas', 'diskon_batas', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('diskon_batas_nilai', 'diskon_batas_nilai', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('penempatan', 'penempatan', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('produk', 'produk', $request, $dataTable);
            $voucher = Voucher::findOrFail($id);
            $voucher->update($dataTable);
            return ResponseFormatter::success($voucher, 'Berhasil menyimpan data voucher');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $voucher = Voucher::findOrFail($id);
            $voucher->delete();
            return ResponseFormatter::success($voucher, 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
