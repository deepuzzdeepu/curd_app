<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reg', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('age');
        $table->text('address');
        $table->enum('gender', ['male', 'female', 'other']);
        $table->string('email')->unique();
        $table->string('phone', 20);
        $table->string('occupation');
        $table->date('date_of_birth');
        $table->timestamps(); // Adds created_at and updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg');
    }
};
