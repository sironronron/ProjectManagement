<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_categories', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id')->index();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('status')->default(0);

            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id')->index();

            // Foreign Keys
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('client_categories')->onDelete('set null');

            // Basic Details
            $table->string('company_photo')->default('client_default.png');
            $table->string('company_name')->unique()->index();
            $table->string('company_phone_number');
            $table->string('address');
            $table->enum('client_status', ['active', 'suspended']);

            $table->softDeletes();            
            $table->timestamps();
        });

        Schema::create('client_users', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_categories');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('client_users');
    }
}
