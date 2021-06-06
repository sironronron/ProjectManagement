<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserNotificationPreferencesInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('notification_new_task')->after('bio')->default(1);
            $table->boolean('notification_mention')->after('notification_new_task')->default(1);
            $table->boolean('notification_new_project')->after('notification_mention')->default(1);
            $table->boolean('notification_new_activity')->after('notification_new_project')->default(1);
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
            $table->dropColumn(['notification_new_task', 'notification_mention', 'notification_new_project', 'notification_new_activity']);
        });
    }
}
