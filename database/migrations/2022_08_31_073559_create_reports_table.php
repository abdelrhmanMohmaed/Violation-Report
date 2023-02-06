<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seel_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->text('description');
            $table->text('recommended_action');
            $table->date('target_Date');
            $table->string('img', 255)->nullable();
            $table->boolean('receipt_confirmation')->default(false);
            $table->boolean('status')->default(false);
            $table->foreignId('principal_id')->constrained();
            $table->string('reported_by');
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
        Schema::dropIfExists('reports');
    }
}
