<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Activity::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = Activity::create([
            'project_id' => $request->input('project_id'),
            'name' => $request->input('name'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status')
        ]);

        return $activity;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        Activity::find($request->route('id'))
            ->update([
                'project_id' => $request->input('project_id'),
                'name' => $request->input('name'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status')
        ]);

        return $activity;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Activity::find($request->route('id'))
            ->delete();

        return true;
    }
}
