<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRemunerationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remuneration_forms', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

            $table->unsignedInteger('chairman_id')->nullable();
            $table->foreign('chairman_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedInteger('dean_id')->nullable();
            $table->foreign('dean_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedInteger('exam_controller_id')->nullable();
            $table->foreign('exam_controller_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedInteger('finance_id')->nullable();
            $table->foreign('finance_id')->references('id')->on('users')->onDelete('set null');

            // $table->unsignedInteger('registrar_id')->nullable();
            // $table->foreign('registrar_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remuneration_forms', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');

            $table->dropForeign(['chairman_id']);
            $table->dropColumn('chairman_id');

            $table->dropForeign(['dean_id']);
            $table->dropColumn('dean_id');

            $table->dropForeign(['exam_controller_id']);
            $table->dropColumn('exam_controller_id');

            $table->dropForeign(['finance_id']);
            $table->dropColumn('finance_id');

            $table->dropForeign(['created_by_id']);
            $table->dropColumn('created_by_id');
        });
    }
}
