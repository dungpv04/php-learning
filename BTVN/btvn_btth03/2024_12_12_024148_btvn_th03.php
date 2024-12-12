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
        //Thu vien
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('contact_number');
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->year('publication_year');
            $table->string('genre');
            $table->unsignedBigInteger('library_id');
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
        });

        //Laptop cho thue
        Schema::create('renters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->unique(); // Đảm bảo email là duy nhất
        });

        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->text('specifications');
            $table->boolean('rental_status')->default(false); // Mặc định chưa cho thuê
            $table->unsignedBigInteger('renter_id')->nullable(); // Cho phép null nếu chưa có người thuê
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null');
        });

        //ql phan cung
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('contact_email')->unique(); // Đảm bảo email là duy nhất
        });

        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->string('type');
            $table->boolean('status')->default(true); // Mặc định thiết bị đang hoạt động
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');
        });

        //phim
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->unsignedInteger('total_seats');
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->date('release_date');
            $table->unsignedInteger('duration');
            $table->unsignedBigInteger('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
