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
            $table->string('client_name');//Nombre del cliente
            $table->string('client_company')->nullable();//Nombre de la empresa (opcional)
            $table->dateTime('event_date')->nullable();//Día del evento y Hora
            $table->integer('guests');//Numero de invitados
            $table->string('event_type');//Tipo de evento
            $table->text('description')->nullable();//Descripción
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); //Estatus de la cotización
            $table->string('folio')->unique();//Folio único
            $table->foreignId('package_id')->nullable()->constrained('packages')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->timestamps();
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
