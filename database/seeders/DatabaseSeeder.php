<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
    {
        Mail::fake(); // Disable mails during seeding
        activity()->disableLogging(); // Disable logging during seeding

        // Seeders
        $this->call(BaseSeeder::class);

        // Application seeders
        $this->call(FabricSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
