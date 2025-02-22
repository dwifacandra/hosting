<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDescriptionTypeInCompaniesAndExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Mengubah tipe kolom description di tabel companies
        Schema::table('companies', function (Blueprint $table) {
            $table->string('description')->nullable()->change(); // Ubah ke tipe yang diinginkan
        });

        // Mengubah tipe kolom description di tabel experiences
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('description')->nullable()->change(); // Ubah ke tipe yang diinginkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Kembalikan tipe kolom description di tabel companies
        Schema::table('companies', function (Blueprint $table) {
            $table->text('description')->nullable()->change(); // Kembalikan ke tipe sebelumnya
        });

        // Kembalikan tipe kolom description di tabel experiences
        Schema::table('experiences', function (Blueprint $table) {
            $table->text('description')->nullable()->change(); // Kembalikan ke tipe sebelumnya
        });
    }
}
