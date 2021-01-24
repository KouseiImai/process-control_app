<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('production_num');
            $table->integer('done_hour');
            $table->integer('done_minutes');
            $table->integer('accident_hour')->nullable();
            $table->integer('accident_minutes')->nullable();
            $table->integer('pre_process_hour')->nullable();
            $table->integer('pre_process_minutes')->nullable();
            $table->text('report_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_reports');
    }
}
