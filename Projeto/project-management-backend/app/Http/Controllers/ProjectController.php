<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Project::where('user_id', $request->user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'budget' => $request->input('budget')
        ]);

        return $project;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
       Project::find($request->route('id'))
            ->update([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'budget' => $request->input('budget')
        ]);

        return Project::find($request->route('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Project::find($request->route('id'))
            ->delete();

        return true;
    }
}
