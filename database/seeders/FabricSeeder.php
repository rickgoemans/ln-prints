<?php

namespace Database\Seeders;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class FabricSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
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
