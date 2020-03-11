<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationColumnsToClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->string('timezone')->after('package_id')->nullable();
            $table->string('postal_code')->after('package_id')->nullable();
            $table->string('state_name')->after('package_id')->nullable();
            $table->string('state')->after('package_id')->nullable();
            $table->string('city')->after('package_id')->nullable();
            $table->string('country')->after('package_id')->nullable();
            $table->string('country_iso_code')->after('package_id')->nullable();
            $table->string('longitude')->after('package_id')->nullable();
            $table->string('latitude')->after('package_id')->nullable();
            $table->string('ip')->after('package_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->dropColumn([
                'ip',
                'latitude',
                'longitude',
                'country_iso_code',
                'country',
                'city',
                'state',
                'state_name',
                'postal_code'
            ]);
        });
    }
}
