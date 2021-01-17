<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotnumberProcessRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotnumber_process_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('lot_number_id');
            $table->unsignedInteger('process_data_id');
            $table->timestamps();

            $table->foreign('lot_number_id')->references('id')->on('lot_numbers')->onDelete('cascade');
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
        Schema::dropIfExists('lotnumber_process_relations');
    }
}
