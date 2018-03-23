<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsRolesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_roles_users', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('role_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('groups_roles_users', function (Blueprint $table) {
            $table->foreign('id_group')->references('id')->on('groups');
            $table->foreign('id_role')->references('id')->on('roles');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_roles_users');
    }
}
