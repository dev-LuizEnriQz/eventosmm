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
        Schema::create('deposit_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('quote_id')->constrained('quotes')->onDelete('cascade');
            $table->string('client_name');//Nombre del Cliente
            $table->string('quote_folio');//Folio de la Cotizacion
            $table->decimal('total_cost', 10, 2);//Costo Total del Evento
            $table->date('payment_deadline');//Fecha Limite de Pago
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_accounts');
    }
};
