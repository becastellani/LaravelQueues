<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('type');
            $table->string('name')->nullable();
            $table->string('razaoSocial')->nullable();
            $table->string('email')->unique();
            $table->string('cpfCnpj')->unique();
            $table->string('phone')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->unsignedInteger('city_id');

            $table->foreign('city_id')->references('id')->on('cities');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            // Remove a chave estrangeira e a coluna city_id antes de excluir a tabela
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
        });

        Schema::dropIfExists('clients');
    }
};
