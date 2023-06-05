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
        Schema::table('products', function (Blueprint $table) {
            $table->longText('extra_image')->after('product_image')->nullable();
            $table->integer('discount_price')->after('price')->nullable();
            $table->integer('discount')->after('price')->nullable();
            $table->boolean('discount_tag')->after('price')->default(0);
            $table->longText('storage_size')->after('details')->nullable();
            $table->longText('color')->after('details')->nullable();
            $table->string('category')->after('details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('extra_image');
            $table->dropColumn('discount_price');
            $table->dropColumn('discount');
            $table->dropColumn('discount_tag');
            $table->dropColumn('storage_size');
            $table->dropColumn('color');
            $table->dropColumn('category');
        });
    }
};
