<?php

namespace Database\Seeders;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class FabricSeeder extends Seeder
{
    public function run()
    {
        if (app()->isProduction()) {
            return;
        }

        /** @var Collection $fabrics */
        $fabrics = Fabric::factory()
            ->count(10)
            ->create();
    }
}
