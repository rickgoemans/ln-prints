<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
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
