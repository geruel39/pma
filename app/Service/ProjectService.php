<?php 

namespace App\Service;

use App\Models\Project;
use App\Models\User;

class ProjectService
{
    public function getAllProjects()
    {
        return Project::with('created_by')->get(); 
    }

    public function createProject(array $data, User $user): Project
    {
        $project = $user->projects()->create($data);

        $project->users()->attach($user->id, ['role' => 'owner']);

        return $project;
    }
}