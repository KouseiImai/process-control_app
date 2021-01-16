<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->integer('start_hour');
            $table->integer('start_minutes');
            $table->date('end_date');
            $table->integer('end_hour');
            $table->integer('end_minutes');
            $table->text('process_remarks')->nullable();
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
        Schema::dropIfExists('process_datas');
    }
}
