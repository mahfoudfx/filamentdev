<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZxInventorySkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('zx_inventory_skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('zx_inventory_items');
            $table->foreignId('parent_id')->nullable()->constrained('zx_inventory_skuses');
            $table->string('batch_no', 64)->nullable();
            $table->string('serial_no', 128)->unique()->nullable();
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
        Schema::dropIfExists('zx_inventory_skus');
    }
}
