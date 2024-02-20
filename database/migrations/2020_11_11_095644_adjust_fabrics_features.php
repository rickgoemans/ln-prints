<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AdjustFabricsFeatures
 *
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class AdjustFabricsFeatures extends Migration
{
    public function up(): void
    {
        Schema::table('fabrics', function (Blueprint $table) {
            $table->renameColumn('recycle_yarn', 'recycled_yarn');
            $table->dropColumn([
                'perfect_fit',
            ]);
            $table->boolean('wrinkle_free_and_easy_care')
                ->default(0)
                ->after('pilling_resistant');
        });
    }

    public function down(): void
    {
        Schema::table('fabrics', function (Blueprint $table) {
            $table->dropColumn([
                'wrinkle_free_and_easy_care',
            ]);
            $table->boolean('perfect_fit')
                ->default(0);
            $table->renameColumn('recycled_yarn', 'recycle_yarn');
        });
    }
}
