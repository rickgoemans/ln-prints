<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AlterFabricsTableAddActiveColumn
 *
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class AlterFabricsTableAddActiveColumn extends Migration
{
    public function up(): void
    {
        Schema::table('fabrics', function (Blueprint $table) {
            $table->boolean('active')
                ->default(1);
        });
    }

    public function down(): void
    {
        Schema::table('fabrics', function (Blueprint $table) {
            $table->dropColumn([
                'active',
            ]);
        });
    }
}
