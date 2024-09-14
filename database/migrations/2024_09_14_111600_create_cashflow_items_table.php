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
        Schema::create('cashflow_items', function (Blueprint $table) {
            $table->id();
            $table->integer('cashflow_id');
            $table->string('product',100);
            $table->integer('quantity');
            $table->float('unitPrice', 8, 2);
            $table->string('packagingInfo');
            $table->float('unitMaterialPrice', 8, 2);
            $table->float('unitOtherCharges', 8, 2);
            $table->float('freight', 8, 2);
            $table->float('unitLocalHandling', 8, 2);
            $table->float('customDuty', 8, 2);
            $table->float('bankCharges', 8, 2);
            $table->float('landedCost', 8, 2);
            $table->float('companyProfileMargin', 8, 2);
            $table->float('profitMargin', 8, 2);
            $table->float('targetPrice', 8, 2);
            $table->float('sellingPrice', 8, 2);
            $table->float('totalSelling', 8, 2);
            $table->float('totalMaterialPrice', 8, 2);
            $table->float('totalOtherCharges', 8, 2);
            $table->float('totalFreight', 8, 2);
            $table->float('totalHandling', 8, 2);
            $table->float('totalCustoms', 8, 2);
            $table->float('totalBankComm', 8, 2);
            $table->float('totalCompanyMargin', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflow_items');
    }
};
