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
            $table->string('clientRef');
            $table->date('date');
            $table->string('company');
            $table->string('department');
            $table->string('description');
            $table->string('countryOrigin');
            $table->string('uom');
            $table->string('packagingInfo');
            $table->string('modeofshipment');
            $table->string('availability');
            $table->string('goodsTravel');
            $table->string('quantity');
            $table->string('incoterms');
            $table->string('unitPrice');
            $table->string('conversion_factor');
            $table->string('unitMaterialPrice');
            $table->string('unitOtherCharges');
            $table->string('freight');
            $table->string('unitLocalHandling');
            $table->string('customDuty');
            $table->string('bankCharges');
            $table->string('landedCost');
            $table->string('companyProfileMargin');
            $table->string('profitMargin');
            $table->string('targetPrice');
            $table->string('sellingPrice');
            $table->string('totalSelling');
            $table->string('qty');
            $table->string('totalMaterialPrice');
            $table->string('totalOthercharges');
            $table->string('totalFreight');
            $table->string('totalHandling');
            $table->string('totalCustoms');
            $table->string('totalBankComm');
            $table->string('totalCompanyMargin');
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
