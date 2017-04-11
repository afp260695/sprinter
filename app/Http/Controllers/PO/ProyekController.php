<?php

namespace App\Http\Controllers\PO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Proyek;
use App\User;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $all_sm = User::where('role','sm')->get();
        $temp_all_proyek = Proyek::all();
        $all_proyek = [];

        foreach ($temp_all_proyek as $proyek) {
            $po = User::where('id', $proyek->id_product_owner)->first();
            $proyek->nama_po = $po->name;
            array_push($all_proyek, $proyek);
        }

        return view('po.project', ['user' => $user, 'all_sm' => $all_sm, 'all_proyek' => $all_proyek]);
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
        $proyek = new Proyek;
        $proyek->nama_klien = $request->input('nama_klien');
        $proyek->nama_proyek = $request->input('nama_proyek');
        $proyek->deskripsi = $request->input('deskripsi');
        $proyek->id_product_owner = $request->input('id_product_owner');
        $proyek->id_scrum_master = $request->input('id_scrum_master');

        $proyek->save();

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
    public function destroy($id)
    {
        //
    }
}
