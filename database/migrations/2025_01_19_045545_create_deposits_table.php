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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deposit_account_id')->constrained('deposit_accounts')->onDelete('cascade');//Id de la cuenta de Deposito
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');//ID usuario que Registro el Deposito
            $table->decimal('amount', 10, 2);//Monto del Deposito
            $table->enum('deposit_type',['inicial','parcial','final']);//'inicial','parcial','final'
            $table->date('payment_date');//Fecha de Pago
            $table->enum('payment_method',['efectivo','transferencia','creditoDeposito']);//Efectivo, Transferencia, Credito/Deposito.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
