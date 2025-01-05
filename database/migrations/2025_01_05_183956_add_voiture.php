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
        //
        Schema::table('voitures', function (Blueprint $table) {
            $table->string('utilisateur')->nullable();
            $table->integer('etat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('voitures', function (Blueprint $table) {
            $table->dropColumn('utilisateur');
            $table->dropColumn('etat');
        });
    }
};
