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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');//Relación con el Cliente
            $table->string('folio');//Folio único
            $table->string('client_name');//Nombre del cliente
            $table->date('event_date');//Día del evento
            $table->text('description');//Descripción
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); //Estatus de la cotización
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
