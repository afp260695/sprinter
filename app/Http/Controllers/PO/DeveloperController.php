<?php

namespace App\Http\Controllers\PO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Proyek_Developer;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $developer = new Proyek_Developer;
        $developer->id_proyek = $request->input('id_proyek');
        $developer->id_developer = $request->input('id_developer');
        $developer->save();

        $user = User::find($developer->id_developer);
        $user->avail = false;
        $user->save();
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
        $temp_developer_in_project = Proyek_Developer::where('id_proyek', $id)->get();
        $developer_in_project = [];

        foreach ($temp_developer_in_project as $dev) {
            $temp_user_dev = User::find($dev->id_developer);
            $dev->nama = $temp_user_dev->name;
            array_push($developer_in_project, $dev);
        }
        $developer = User::where('avail',true)
                    ->where('role','dev')
                    ->get();
                    
        return view('po.developer',['developer_in_project' => $developer_in_project, 'id_proyek' => $id, 'developer' => $developer]);
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
