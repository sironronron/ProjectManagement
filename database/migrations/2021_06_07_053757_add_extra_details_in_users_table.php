<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraDetailsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->after('notification_new_activity')->nullable();
            $table->string('position')->after('phone_number')->nullable();
            $table->string('facebook_link')->after('position')->nullable();
            $table->string('twitter_link')->after('facebook_link')->nullable();
            $table->string('linkedin_link')->after('twitter_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'position', 'facebook_link', 'twitter_link', 'linkedin_link']);
        });
    }
}
