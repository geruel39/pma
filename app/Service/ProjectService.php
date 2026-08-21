<?php 

namespace App\Service;

use App\Models\Project;
use App\Models\User;

class ProjectService
{
    public function getAllProjects()
    {
        return Project::with('creator')->get(); 
    }

    public function createProject(array $data, User $user): Project
    {
        $project = $user->projects()->create($data);

        $project->users()->sync([$user->id, ['role' => 'owner']]);

        return $project;
    }

    public function updateProject(Project $project, array $data): Project
    {
        $project->update($data);

        return $project;
    }
}