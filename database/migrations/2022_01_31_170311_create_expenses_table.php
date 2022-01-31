<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->double("amount");
            $table->timestamp("date")->useCurrent();

            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("expense_type_id")->constrained("expense_types");
            $table->foreignId("expense_subtype_id")->nullable()->constrained("expense_subtypes");

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
        Schema::dropIfExists('expenses');
    }
}
