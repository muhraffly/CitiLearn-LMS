<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
            $table->string('course_code', 5);
            $table->id('pdf_id');
            $table->string('pdf_title', 100);
            $table->string('pdf_file_path');
            $table->timestamps();

            // Menetapkan foreign key untuk course_code dengan ON DELETE CASCADE
            $table->foreign('course_code')
                ->references('course_code')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdfs', function (Blueprint $table) {
            $table->dropForeign(['course_code']);
        });
        
        Schema::dropIfExists('pdfs');
    }
};
