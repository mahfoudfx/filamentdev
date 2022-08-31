<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZxInventoryCategoryZxInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('zx_inventory_category_zx_inventory_item', function (Blueprint $table) {
            $table->foreignId('zx_inventory_category_id');
            $table->foreignId('zx_inventory_item_id');
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
        Schema::dropIfExists('zx_inventory_category_zx_inventory_item');
    }
}
