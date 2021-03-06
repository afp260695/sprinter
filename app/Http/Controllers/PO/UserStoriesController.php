<?php

namespace App\Http\Controllers\PO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Proyek;
use App\User_Stories;
use App\User;

class UserStoriesController extends Controller
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
        $user_story = new User_Stories;
        $user_story->id_proyek = $request->input('id_proyek');
        $user_story->deskripsi = $request->input('deskripsi');
        $user_story->save();
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
        $all_user_stories = User_Stories::where('id_proyek', $id)->get();
        $developer = User::where('avail',true)
                    ->where('role','dev')
                    ->get();
        return view('po.user-story',['all_user_stories' => $all_user_stories, 'id_proyek' => $id, 'developer' => $developer]);
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
