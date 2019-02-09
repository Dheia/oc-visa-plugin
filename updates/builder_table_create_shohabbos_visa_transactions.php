<?php namespace Shohabbos\Visa\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosVisaTransactions extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_visa_transactions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->decimal('amount', 10, 2);
            $table->string('owner_id');
            $table->string('code')->nullable();
            $table->string('code_desc')->nullable();
            $table->string('payer_name')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_visa_transactions');
    }
}
