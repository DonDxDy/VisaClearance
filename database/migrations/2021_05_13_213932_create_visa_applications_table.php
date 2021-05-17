<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names');
            $table->bigInteger('phone');
            $table->string('email');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('state_of_residence');
            $table->string('lga_of_origin');
            $table->string('state_of_origin');
            $table->string('evidence_business_status')->nullable();
            $table->string('evidence_business_link')->nullable();
            $table->string('evidence_of_cbn_payment')->nullable();
            $table->string('tax_clearance')->nullable();
            $table->string('certificate_of_lga_state')->nullable();
            $table->string('passport_photograph')->nullable();
            $table->string('international_passport')->nullable();
            $table->string('application_for_clearance')->nullable();
            $table->string('sponsor_letter')->nullable();
            $table->string('statement_of_account_sponsor')->nullable();
            $table->string('guarantor_1_names')->nullable();
            $table->string('guarantor_2_names')->nullable();
            $table->foreignId('office_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_applications');
    }
}
