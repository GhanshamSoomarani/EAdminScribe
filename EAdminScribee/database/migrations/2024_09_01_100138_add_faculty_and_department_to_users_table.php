<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacultyAndDepartmentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('faculty_id')->nullable()->after('email');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('set null');

            $table->unsignedBigInteger('department_id')->nullable()->after('faculty_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
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
            $table->dropForeign(['faculty_id']);
            $table->dropColumn('faculty_id');

            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });
    }
}
