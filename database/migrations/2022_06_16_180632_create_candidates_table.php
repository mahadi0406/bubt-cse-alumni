<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->index()->nullable();
            $table->foreignId('user_id')->index()->nullable();
            $table->integer('expected_salary')->default(0);
            $table->string('resume_link', 250)->nullable();
            $table->string('github_link', 100)->nullable();
            $table->string('portfolio_link', 100)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1: active, 2: inactive');
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
        Schema::dropIfExists('candidates');
    }
};
