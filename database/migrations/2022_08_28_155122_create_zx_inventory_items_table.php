<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZxInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('zx_inventory_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained('zx_icons');
            $table->foreignId('parent_id')->nullable()->constrained('zx_inventory_items');
            $table->boolean('variant_or_part')->nullable();
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('model_no', 64)->nullable();
            $table->string('barcode', 64)->unique()->nullable();
            $table->string('photo_url', 128)->nullable();
            $table->boolean('enabled')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('zx_inventory_items');
    }
}
