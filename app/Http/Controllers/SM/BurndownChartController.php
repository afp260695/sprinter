<?php

namespace App\Http\Controllers\SM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User_Stories;
use App\Task;

class BurndownChartController extends Controller
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
        $task = new Task;
        $task->id_developer = 0;//default value
        $task->id_user_stories = $request->input('id_user_stories');
        $task->deskripsi = $request->input('deskripsi');
        $task->lama_pengerjaan = $request->input('lama_pengerjaan');
        $task->save();

        $user_stories = User_Stories::find($request->input('id_user_stories'));
        $user_stories->id_sprint = $request->input('id_sprint');

        $user_stories->save();

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
        $temp_all_user_stories = User_Stories::where('id_sprint',0)
                            ->orWhere('id_sprint',$id)->get();

        $all_user_stories = [];

        foreach ($temp_all_user_stories as $user_stories) {
            $user_stories->tasks = Task::where('id_user_stories', $user_stories->id)->get();

            array_push($all_user_stories, $user_stories);
        }

        // echo json_encode($all_user_stories);
        // die();

        return view('sm.burndown_chart', ['all_user_stories' => $all_user_stories, 'id_sprint' => $id]);
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
