<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFabricsTable
 *
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class CreateFabricsTable extends Migration
{
    public function up(): void
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->id();
            $table->string('article_number');
            $table->string('name');
            $table->string('composition');
            $table->unsignedInteger('usable_width');
            $table->unsignedInteger('weight');
            $table->text('nl_description');
            $table->text('en_description');
            $table->boolean('two_way_stretch')
                ->default(0);
            $table->boolean('pilling_resistant')
                ->default(0);
            $table->boolean('perfect_fit')
                ->default(0);
            $table->boolean('quick_dry')
                ->default(0);
            $table->boolean('breathable')
                ->default(0);
            $table->boolean('moisture_management')
                ->default(0);
            $table->boolean('muscle_control')
                ->default(0);
            $table->boolean('uv_protection')
                ->default(0);
            $table->boolean('recycle_yarn')
                ->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fabrics');
    }
}
