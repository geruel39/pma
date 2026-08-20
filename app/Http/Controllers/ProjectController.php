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
        $projects = Project::with('creator')->get();
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
