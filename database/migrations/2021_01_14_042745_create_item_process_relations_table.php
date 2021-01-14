<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemProcessRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_process_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_item_id');
            $table->unsignedInteger('process_data_id');
            $table->timestamps();

            $table->foreign('production_item_id')->references('id')->on('production_items')->onDelete('cascade');
            $table->foreign('process_data_id')->references('id')->on('process_datas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_process_relations');
    }
}
