<?php

namespace App\Http\Controllers;

use App\Helpers\RequestChecker;
use Illuminate\Http\Request;
use App\Models\FoodishProduct;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;

class FoodishProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $foodish = FoodishProduct::all();
            return ResponseFormatter::success($foodish, 'Berhasil mengambil data produk');
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
            $dataTable = RequestChecker::add('mc_id', 'mc_id', $request, $dataTable);
            $dataTable = RequestChecker::add('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::add('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::add('deskripsi', 'deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::add('id_kategori', 'id_kategori', $request, $dataTable);
            $dataTable = RequestChecker::add('kategori', 'kategori', $request, $dataTable);
            $dataTable = RequestChecker::add('harga', 'harga', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_delivery', 'id_delivery', $request, $dataTable);
            $dataTable = RequestChecker::add('delivery', 'delivery', $request, $dataTable);
            $dataTable = RequestChecker::add('harga_delivery', 'harga_delivery', $request, $dataTable);
            $dataTable = RequestChecker::add('berat', 'berat', $request, $dataTable);
            $dataTable = RequestChecker::add('gambar', 'gambar', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('aktif', 'aktif', $request, $dataTable);
            $foodish = FoodishProduct::create($dataTable);
            return ResponseFormatter::success($foodish, 'Berhasil menyimpan data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $foodish = FoodishProduct::findOrFail($id)->get();
            return ResponseFormatter::success($foodish, 'Berhasil mengambil data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $foodish = FoodishProduct::where('idrs', $idrs)->get();
            return ResponseFormatter::success($foodish, 'Berhasil mengambil data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $idrs = $request->idrs;
            $query = $request->name;
            $search = FoodishProduct::where('idrs', $idrs)->where('nama', 'LIKE', '%' . $query . '%')->get();
            return ResponseFormatter::success($search, 'Berhasil mengambil data pencarian');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function multipleid(Request $request)
    {
        try {
            $produk = $request->produk;
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
            return ResponseFormatter::success($selected, 'Berhasil mengambil ' . count($selected) . ' data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodishProduct $foodishProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('mc_id', 'mc_id', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('deskripsi', 'deskripsi', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_kategori', 'id_kategori', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('kategori', 'kategori', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('harga', 'harga', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('id_delivery', 'id_delivery', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('delivery', 'delivery', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('harga_delivery', 'harga_delivery', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('berat', 'berat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('gambar', 'gambar', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('aktif', 'aktif', $request, $dataTable);
            $foodish = FoodishProduct::findOrFail($id);
            $foodish->update($dataTable);
            return ResponseFormatter::success($foodish, 'Berhasil mengubah data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $foodish = FoodishProduct::findOrFail($id);
            $foodish->delete();
            return ResponseFormatter::success($foodish, 'Berhasil menghapus data produk');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
