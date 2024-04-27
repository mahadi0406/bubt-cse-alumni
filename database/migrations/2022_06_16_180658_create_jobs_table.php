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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->index();
            $table->string('title', 150)->index();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->string('location', 200)->nullable();
            $table->boolean('is_remote_allowed')->default(false);
            $table->string('currency', 10);
            $table->decimal('minimum_salary')->default(0);
            $table->decimal('maximum_salary')->default(0);
            $table->tinyInteger('vacancies');
            $table->date('deadline')->nullable();
            $table->string('office_time')->nullable();
            $table->text('benefits')->nullable();
            $table->tinyInteger('type')->default(\App\Enums\Job\Type::FULL_TIME->value);
            $table->tinyInteger('status')->default(\App\Enums\Job\Status::PENDING->value);
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
        Schema::dropIfExists('jobs');
    }
};
