<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('seel', 60);
            $table->string('area');
            $table->string('category');
            $table->text('description');
            $table->text('recommended_action');
            $table->date('target_Date');
            $table->string('img', 255)->nullable();
            $table->boolean('receipt_confirmation')->default(false);
            $table->boolean('status')->default(true);
            $table->foreignId('principal_id')->constrained();
            $table->string('receipt_name', 60);
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
};
