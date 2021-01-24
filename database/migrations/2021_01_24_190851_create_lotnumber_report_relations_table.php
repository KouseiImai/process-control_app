<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotnumberReportRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotnumber_report_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('lot_number_id');
            $table->unsignedInteger('daily_report_id');
            $table->timestamps();

            $table->foreign('lot_number_id')->references('id')->on('lot_numbers')->onDelete('cascade');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotnumber_report_relations');
    }
}
