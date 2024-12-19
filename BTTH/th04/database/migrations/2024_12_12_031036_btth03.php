<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //prac 3
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('computer_name');
            $table->string('model');
            $table->string('operating_system');
            $table->string('processor');
            $table->integer('memory');
            $table->boolean('available');
        });

        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->string('reported_by');
            $table->datetime('reported_date');
            $table->text('description');
            $table->enum('urgency', ['Low','Medium', 'High'])->default('Low');
            $table->enum('status', ['Open','In progress','Resolved'])->default('Open');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('issues');
        Schema::dropIfExists('computers');
    }
};
