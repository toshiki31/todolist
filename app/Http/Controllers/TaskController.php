<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
use App\Models\User;
use Auth;

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
        $count = User::query()
        ->find(Auth::user()->id)
        ->userTasks()
        ->where('isfinished', 1)
        ->count();

        //dd($count);
        return view('task.mypage',compact('count'));
    }
}
