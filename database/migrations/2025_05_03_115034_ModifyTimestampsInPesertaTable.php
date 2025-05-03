<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class ModifyTimestampsInPesertaTable extends Migration
{
    public function up()
    {
        Schema::table('peserta', function (Blueprint $table) {
            // Ubah kolom created_at untuk tidak NULL dan memberikan default CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent()->nullable(false)->change();

            // Ubah kolom updated_at untuk tidak NULL dan memberikan default CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down()
    {
        Schema::table('peserta', function (Blueprint $table) {
            // Kembalikan kolom ke status semula
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });
    }
}
