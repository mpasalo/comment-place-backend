<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTertiaryCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tertiary_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->unsignedInteger('secondary_comment_id');
            $table->text('body');
            $table->timestamps();
    
            $table->foreign('secondary_comment_id')
                ->references('id')
                ->on('secondary_comments')
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
        Schema::dropIfExists('tertiary_comments');
    }
}
