<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('git_name')->nullable();
            $table->string('git_url')->nullable();;
            $table->string('git_avatar_url')->nullable();;
            $table->text('git_bio')->nullable();
            $table->text('location')->nullable();
            $table->integer('git_public_repos')->nullable();
            $table->integer('git_public_followers')->nullable();
            $table->integer('git_public_following')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
