<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/3/20, 7:49 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('shipping_id')->nullable()->unsigned()->after('billing_id');
            $table->foreign('shipping_id')->references('id')->on('locations')->onDelete('cascade');
            $table->bigInteger('shipping_method_id')->nullable()->unsigned()->after('discount_id');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onDelete('cascade');
            $table->bigInteger('shipping_total')->default(0)->after('products_total');
            $table->string('shipping_status')->default('pending')->after('payed_at');
            $table->timestamp('shipped_at')->nullable()->after('payed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function($table) {
            $table->dropColumn('shipping_id');
            $table->dropColumn('shipping_method_id');
            $table->dropColumn('shipping_total');
            $table->dropColumn('shipping_status');
            $table->dropColumn('shipped_at');
        });
    }
};
