<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentAndDiscountToTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            if (!Schema::hasColumn('transaksis', 'status_pembayaran')) {
                $table->string('status_pembayaran')->default('pending')->after('status');
            }
            if (!Schema::hasColumn('transaksis', 'diskon')) {
                $table->decimal('diskon', 8, 2)->default(0)->after('total');
            }
            if (!Schema::hasColumn('transaksis', 'total_akhir')) {
                $table->decimal('total_akhir', 12, 2)->after('diskon');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            if (Schema::hasColumn('transaksis', 'status_pembayaran')) {
                $table->dropColumn('status_pembayaran');
            }
            if (Schema::hasColumn('transaksis', 'diskon')) {
                $table->dropColumn('diskon');
            }
            if (Schema::hasColumn('transaksis', 'total_akhir')) {
                $table->dropColumn('total_akhir');
            }
        });
    }
}