<?php

namespace App\Http\Controllers;

use App\Models\NPWP;
use Illuminate\Http\Request;
use App\Helpers\RequestChecker;
use App\Helpers\ResponseFormatter;

class NPWPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $npwp = NPWP::all();
            return ResponseFormatter::success($npwp, 'Berhasil mengambil data NPWP');
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
            $dataTable = RequestChecker::add('alamat', 'alamat', $request, $dataTable);
            $dataTable = RequestChecker::add('npwp', 'npwp', $request, $dataTable);
            $dataTable = RequestChecker::add('nik', 'nik', $request, $dataTable);
            $dataTable = RequestChecker::add('npwp_img', 'npwp_img', $request, $dataTable);
            $npwp = NPWP::create($dataTable);
            return ResponseFormatter::success($npwp, 'Berhasil menyimpan data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NPWP  $nPWP
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $npwp = NPWP::findOrFail($id);
            return ResponseFormatter::success($npwp, 'Berhasil mengambil data NPWP');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    public function byidrs($idrs)
    {
        try {
            $npwp = NPWP::where('idrs', $idrs)->get();
            return ResponseFormatter::success($npwp, 'Berhasil mengambil data NPWP');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NPWP  $nPWP
     * @return \Illuminate\Http\Response
     */
    public function edit(NPWP $nPWP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NPWP  $nPWP
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $dataTable = [];
            $dataTable = RequestChecker::checkifexist('nama', 'nama', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('idrs', 'idrs', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('alamat', 'alamat', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('npwp', 'npwp', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('nik', 'nik', $request, $dataTable);
            $dataTable = RequestChecker::checkifexist('npwp_img', 'npwp_img', $request, $dataTable);
            $npwp = NPWP::findOrFail($id);
            $npwp->update($dataTable);
            return ResponseFormatter::success($npwp, 'Berhasil mengubah data merchant');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NPWP  $nPWP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $npwp = NPWP::findOrFail($id);
            $npwp->delete();
            return ResponseFormatter::success($npwp, 'Berhasil menghapus data NPWP');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([], $th->getMessage(), 500);
        }
    }
}
