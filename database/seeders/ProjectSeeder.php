<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('projectsData.projects');
        foreach ($projects as $project) {
            $newProj = new Project();
            $newProj->title = $project['title'];
            $newProj->slug = Str::slug($project['title'], '-');
            $newProj->image = $project['image'];
            $newProj->body = $project['body'];
            $newProj->user_id = 1;
            $newProj->save();
        }
    }
}
