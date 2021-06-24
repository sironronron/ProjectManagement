<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsInProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->after('category_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('assigned_to')->after('client_id');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('project_manager_id')->after('assigned_to');
            $table->foreign('project_manager_id')->references('id')->on('users')->onDelete('cascade');

            $table->double('budget', 12, 2)->after('visibility');
            $table->double('remaining_budget', 12, 2)->after('budget');

            $table->text('tags')->nullable()->after('remaining_budget');

            // Drop Team ID
            $table->dropForeign('projects_team_id_foreign');
            $table->dropColumn('team_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_client_id_foreign');
            $table->dropColumn('client_id');

            $table->dropForeign('projects_assigned_to_foreign');
            $table->dropColumn('assigned_to');

            $table->dropForeign('projects_project_manager_id_foreign');
            $table->dropColumn('project_manager_id');

            $table->dropColumn(['budget', 'remaining_budget']);

            // Add Team ID
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }
}
