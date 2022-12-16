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
        Schema::create('sub_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->enum("is_active", ["active" , "inactive"]);
            $table->unsignedBigInteger('parent_section');
            $table->timestamps();

            $table->foreign('parent_section')->references('id')->on('sections')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_sections');
    }
};
