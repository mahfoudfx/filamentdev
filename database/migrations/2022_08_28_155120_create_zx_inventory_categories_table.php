<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZxInventoryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('zx_inventory_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('zx_inventory_categories');
            $table->foreignId('category_name_id')->constrained('zx_inventory_category_names');
            $table->json('description')->nullable();
            $table->boolean('enabled')->default(1);
            $table->foreignId('icon_id')->nullable()->constrained('zx_icons');
            $table->unique(['parent_id', 'category_name_id']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zx_inventory_categories');
    }
}
