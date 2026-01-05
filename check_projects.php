<?php

use App\Models\Project;

$projects = Project::all();

echo "Total Projects: " . $projects->count() . "\n";
foreach ($projects as $project) {
    echo "ID: {$project->id}, Title: {$project->title}, Category: {$project->category}\n";
}
