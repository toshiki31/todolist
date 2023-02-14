<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
use App\Models\Rank;
use App\Models\User;
use Auth;

function devide_time($datetime){
    // dd($datetime);
    $year=mb_substr($datetime,0,4);
    $month=mb_substr($datetime,5,2);
    $day=mb_substr($datetime,8,2);
    $hour=mb_substr($datetime,11,2);
    $min=mb_substr($datetime,14,2);
    $sec=mb_substr($datetime,17,2);
    $devided_time["year"]=$year;
    $devided_time["month"]=$month;
    $devided_time["day"]=$day;
    $devided_time["hour"]=$hour;
    $devided_time["min"]=$min;
    $devided_time["sec"]=$sec;
    return $devided_time;
}

// 今日のタスク完了数を取得
function get_today_finished_tasks(){
    $finished_tasks=Task::where('isfinished',1)->orderBy('updated_at','desc')->get();
    $today=date("Y-m-d H:i:s");
    // dd($today);

    $devided_time=devide_time($today);
    $today_tasks=array();
    foreach($finished_tasks as $finished_task){

        $finished_at=devide_time($finished_task->updated_at);

        if($devided_time['year']===$finished_at['year']){
            if($devided_time['month']===$finished_at['month']){
                if($devided_time['day']===$finished_at['day']){
                    $today_tasks[]=$finished_task;
                }
            }
        }
    }
    // dd($today_tasks);
    $count=count($today_tasks);
    // dd($count);
    return $count;
}

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getAllOrderByUpdated_at()はModels\Taskで定義
        //$tasks = Task::task_sort();
        $tasks = User::query()
        ->find(Auth::user()->id)
        ->userTasks()
        ->orderBy('isfinished', 'asc')
        ->orderBy('urgency', 'asc')
        ->orderBy('seriousness', 'asc')
        ->get();
        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // バリデーション
        $validator = Validator::make($request->all(), [
            'task' => 'required | max:255',
            'comment' => 'nullable',
            'seriousness' => 'required',
            'urgency' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('task.create')
            ->withInput()
            ->withErrors($validator);
        }
        
        $data = $request->merge(['user_id'=>Auth::user()->id])->all();
        $result = Task::create($data);
        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show', compact('task')); 
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

    public function mypage(){
        // 達成済みのタスク数を取得
        $sum = User::query()
        ->find(Auth::user()->id)
        ->userTasks()
        ->where('isfinished', 1)
        ->count();
        // dd($sum);
        $rank=round($sum/10, 1);
        // dd($rank);
        $rank=(int) $rank;
        // dd($rank);
        $rankCheck=Rank::where('rank',$rank)->exists();
        // dd($rankCheck);
        if($rankCheck){
            $phrase=Rank::where('rank',$rank)->value('phrase');
        }else{
            $phrase=Rank::orderBy('rank','desc')->value('phrase');
        }

        $count=get_today_finished_tasks();
        
        if($count>=5){
            $cicle_state="excellent";
        }elseif($count>=3){
            $cicle_state="great";
        }elseif($count>=1){
            $cicle_state="good";
        }else{
            $cicle_state="ok";
        }

        // dd($phrase);
        return view('task.mypage',compact('count','cicle_state','sum','phrase'));
    }
}
