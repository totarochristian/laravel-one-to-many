<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $projects = $user->is_admin ? Project::paginate(3) : Project::where('user_id', $user->id)->paginate(3);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();//Retrieve the id of the user authenticated
        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads', $request->image);
            $data['image'] = asset('storage/' . $image_path);
        }

        $project = Project::create($data);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        $user = Auth::user();
        //Enter in the detail project page only if the user is admin or the user created the project
        if($user->is_admin || $user->id == $project->user_id)
            return view('admin.projects.show', compact('project'));
        else
            abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $user = Auth::user();
        //Enter in the detail project page only if the user is admin or the user created the project
        if($user->is_admin || $user->id == $project->user_id)
            return view('admin.projects.edit', compact('project'));
        else
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;
        if ($request->hasFile('image')) {
            if ($project->image) {
                $toBeRemoved = "http://127.0.0.1:8000/storage/";
                $project->image = str_replace($toBeRemoved, '', $project->image);
                Storage::delete($project->image);
            }
            $image_path = Storage::put('uploads', $request->image);
            $data['image'] = asset('storage/' . $image_path);
        }
        $project->update($data);
        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Il progetto è stato aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            $toBeRemoved = "http://127.0.0.1:8000/storage/";
            $project->image = str_replace($toBeRemoved, '', $project->image);
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully.");
    }
}
