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
        //prac 1
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('dosage');
            $table->string('form');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone');
        });

        //prac 2
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('grade_level', ['Pre-K','Kindergarten'])->default('Pre-K');
            $table->string('room_number');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('parent_phone');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });

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
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('medicines');
    }
};
