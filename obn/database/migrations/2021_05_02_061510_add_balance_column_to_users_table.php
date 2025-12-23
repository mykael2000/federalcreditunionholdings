<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBalanceColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('account_balance', 20, 2)->after('account_number')->nullable();
            $table->string('imf')->after('account_balance')->nullable();
            $table->string('cot')->after('imf')->nullable();
            $table->string('ipn')->after('cot')->nullable();
            $table->string('transfer_mode')->default('request-otp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('account_balance');
            $table->dropColumn('imf');
            $table->dropColumn('cot');
            $table->dropColumn('ipn');
            $table->dropColumn('transfer_mode');
        });
    }
}
