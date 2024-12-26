<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemunerationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remuneration_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('examiner');
            $table->string('term');
            $table->string('year');
            $table->string('batch');
            $table->enum('exam_type', ['regular', 'supplementary']);
            $table->string('exam_date_theory')->nullable();
            $table->string('exam_date_practical')->nullable();
            $table->string('ref');
            $table->string('date');
            $table->string('subject');

            // Bill details
            $table->integer('quantity1')->nullable();
            $table->decimal('rate1', 10, 2)->nullable();
            $table->decimal('amount1', 10, 2)->nullable();

            $table->integer('quantity2')->nullable();
            $table->decimal('rate2', 10, 2)->nullable();
            $table->decimal('amount2', 10, 2)->nullable();

            $table->integer('quantity3')->nullable();
            $table->decimal('rate3', 10, 2)->nullable();
            $table->decimal('amount3', 10, 2)->nullable();

            $table->integer('quantity4')->nullable();
            $table->decimal('rate4', 10, 2)->nullable();
            $table->decimal('amount4', 10, 2)->nullable();

            $table->integer('quantity5')->nullable();
            $table->decimal('rate5', 10, 2)->nullable();
            $table->decimal('amount5', 10, 2)->nullable();

            $table->integer('quantity6')->nullable();
            $table->decimal('rate6', 10, 2)->nullable();
            $table->decimal('amount6', 10, 2)->nullable();

            $table->integer('quantity7')->nullable();
            $table->decimal('rate7', 10, 2)->nullable();
            $table->decimal('amount7', 10, 2)->nullable();

            $table->integer('quantity8')->nullable();
            $table->decimal('rate8', 10, 2)->nullable();
            $table->decimal('amount8', 10, 2)->nullable();

            $table->integer('quantity9')->nullable();
            $table->decimal('rate9', 10, 2)->nullable();
            $table->decimal('amount9', 10, 2)->nullable();
            $table->string('in_words');
            // Summary
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('deduction', 10, 2)->nullable();
            $table->decimal('net_amount', 10, 2)->nullable();

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remuneration_forms');
    }
}
