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
        Schema::create('videos', function (Blueprint $table) {
            $table->string('course_code', 5);
            $table->id('video_id');
            $table->string('video_title', 100);
            $table->string('video_url');
            $table->timestamps();

            // Menetapkan course_code sebagai foreign key dengan ON DELETE CASCADE
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
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign(['course_code']);
        });
        
        Schema::dropIfExists('videos');
    }
};
