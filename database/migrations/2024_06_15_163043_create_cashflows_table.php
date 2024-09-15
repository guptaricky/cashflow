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
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo');
            $table->string('clientName');
            $table->date('date');
            $table->string('company');
            $table->string('department');
            $table->string('countryOrigin');
            $table->string('modeofshipment');
            $table->string('availability');
            $table->string('goodsTravel');
            $table->string('incoterms');
            $table->string('currency');
            $table->string('conversion_factor');
            $table->string('profitMargin');
            $table->string('targetPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflows');
    }
};
