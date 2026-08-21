<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Service\ProjectService;

class ProjectController extends Controller
{
    public function __construct(
        public ProjectService $service
    )
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->service->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = auth()->user()->id;

        $project = $this->service->createProject(
            data: $data,
            user: auth()->user()
        );

        return redirect()->route('projects.index')->with('success', "Project {$project->name} created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project = $this->service->updateProject(project: $project, data: $request->validated());

        return redirect()->route('projects.index')->with('success', "Project {$project->name} created successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect()
            ->route('projects.index')
            ->with('success', $project->name . ' product deleted successfully.');
    }
}
