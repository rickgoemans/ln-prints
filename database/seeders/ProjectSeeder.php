<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        if (app()->isProduction()) {
            return;
        }

        /** @var Collection $projects */
        $projects = Project::factory()
            ->count(10)
            ->create();
    }
}
