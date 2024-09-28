<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Functions\Helper;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Helper::generateSlug($data['title'], Project::class);

        if(array_key_exists('img_path', $data)){

            $img = Storage::put('uploads', $data['img_path']);

            $img_original_name = $request->file('img_path')->getClientOriginalName();

            $data['img_path'] = $img;
            $data['img_original_name'] = $img_original_name;

        }

        $new_project = Project::create($data);

        $new_project->technologies()->attach($data['technologies']);

        // $new_project = new Project;

        // $new_project->fill($data);
        // $new_project->save();

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Project::class);

        $update_project = Project::find($id);
        $update_project->technologies()->sync($data['technologies']);

        $update_project->fill($data);

        $update_project->save();

        return redirect()->route('admin.projects.show', $update_project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
