<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('email')->nullable()->after('name');
            $table->string('phone_number', 50)->nullable()->after('email');
            $table->date('birth_date')->nullable()->after('phone_number');
            $table->string('location', 100)->nullable()->after('birth_date');
            $table->string('city', 50)->nullable()->after('location');
            $table->string('province', 50)->nullable()->after('city');
            $table->string('country', 50)->nullable()->after('province');         
            $table->string('postal_code', 10)->nullable()->after('country');
            $table->enum('types', ['PROVIDER', 'RENTER', 'BUYER'])->default('BUYER')->after('postal_code');
            $table->boolean('is_gdpr')->default(false)->after('types');
            
            //business
            $table->date('contract_signing_date')->nullable()->after('is_gdpr');
            $table->date('contract_end_date')->nullable()->after('contract_signing_date');
            $table->boolean('is_leagal')->default(false)->after('contract_end_date');
            
            $table->string('export_type')->nullable()->after('is_leagal');
            $table->enum('status', ['Active', 'Inactive'])->default('Active')->after('export_type');
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                    'email', 
                    'phone_number',
                    'birth_date',
                    'location',
                    'city',
                    'province',
                    'country',
                    'postal_code',
                    'types',
                    'is_gdpr',
                    'contract_signing_date',
                    'contract_end_date',
                    'is_leagal',
                    'export_type',
                    'status'                
            ]);
            $table->dropSoftDeletes();
        });
    }
}
