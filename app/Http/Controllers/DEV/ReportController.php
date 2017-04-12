<?php

namespace App\Http\Controllers\DEV;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Proyek_Developer;
use App\Task;
use App\User_Stories;
use App\Obstacle;
class ReportController extends Controller
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
        $obstacle = Obstacle::where('id_developer',$user->id)->where('tanggal', date('Y-m-d'))->get();

        if(count($obstacle) > 0) {
            return view('dev.finishReport');
        }
        
        $proyek_developer = Proyek_Developer::where('id_developer',$user->id)->get();

        if(count($proyek_developer)<=0) {
            return view('dev.notInProject');
        }

        $temp_all_user_stories = User_Stories::where('id_proyek',$proyek_developer[0]->id_proyek)->get();

        $all_user_stories = [];

        foreach ($temp_all_user_stories as $user_stories) {
            $user_stories->tasks = Task::where('id_user_stories', $user_stories->id)->where('status', false)->get();

            array_push($all_user_stories, $user_stories);
        }

        

        return view('dev.report',['user' => $user, 'all_user_stories' => $all_user_stories]);
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
        $nDone = $request->input('nDone');
        $user = Auth::user();

        for ($i=1; $i <= $nDone ; $i++) { 
            
            $nameInput = "done".$i;
            $task = Task::find($request->input($nameInput));
            $task->status = true;
            $task->id_developer = $user->id;
            $task->save();
        }

        $obstacle = new Obstacle;
        if($request->input('obstacle') == '' || $request->input('obstacle') == null){ 
            $obstacle->deskripsi = "-"; 
        } else {
            $obstacle->deskripsi = $request->input('obstacle');
        }

        $obstacle->tanggal = date('Y-m-d');
        $obstacle->id_developer = $user->id;
        $obstacle->save();
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
