<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGxStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gx_students', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->text('name');
            $table->text('gender');
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('father_name')->nullable();
            $table->text('father_phone')->nullable();
            $table->text('group_name')->nullable();
            $table->text('center_name')->nullable();
            $table->text('school_name')->nullable();

            $table->text('address')->nullable();
            $table->text('section_ID')->nullable();
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
        Schema::dropIfExists('gx_students');
    }
}
