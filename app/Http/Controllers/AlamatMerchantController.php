<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function show(AlamatMerchant $alamatMerchant)
    {
        //
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
    public function update(Request $request, AlamatMerchant $alamatMerchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlamatMerchant  $alamatMerchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlamatMerchant $alamatMerchant)
    {
        //
    }
}
