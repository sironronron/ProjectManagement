<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task_statuses', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('name', 191);
            $table->integer('order_by')->nullable();
            $table->timestamps();
        });

        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id')->index();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('milestone_id')->nullable();
            $table->foreign('milestone_id')->references('id')->on('project_milestones')->onDelete('set null');

            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('project_task_statuses')->onDelete('set null');

            $table->string('title', 191);
            $table->longText('description')->nullable();
            $table->enum('priority', ['normal', 'high', 'urgent', 'low'])->default('normal');

            $table->boolean('visible_to_client')->default(false);
            $table->boolean('billable')->default(true);
            $table->boolean('completed')->default(false);

            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();

            $table->json('tags')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('project_tasks');
        Schema::dropIfExists('project_task_statuses');
    }
}
