<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AlterProjectsTableMakeNameLocalized
 *
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class AlterProjectsTableMakeNameLocalized extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('name', 'nl_name');

        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('en_name')
                ->after('nl_name');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('nl_name', 'name');
            $table->dropColumn([
                'en_name',
            ]);
        });
    }
}
