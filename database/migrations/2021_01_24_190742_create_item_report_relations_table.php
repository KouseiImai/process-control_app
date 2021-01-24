<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemReportRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_report_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_item_id');
            $table->unsignedInteger('daily_report_id');
            $table->timestamps();

            $table->foreign('production_item_id')->references('id')->on('production_items')->onDelete('cascade');
            $table->foreugn('daily_report_id')->references('id')->on('daily_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_report_relations');
    }
}
