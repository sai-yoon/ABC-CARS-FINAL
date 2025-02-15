<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('biddings', function (Blueprint $table) {
            $table->renameColumn('price', 'amount');
        });
    }

    public function down()
    {
        Schema::table('biddings', function (Blueprint $table) {
            $table->renameColumn('amount', 'price');
        });
    }
};
