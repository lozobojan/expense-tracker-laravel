<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeDeleteOnAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attachments', function (Blueprint $table){
            $table->dropForeign("attachments_expense_id_foreign");
            $table->foreignId("expense_id")->change()
                ->constrained("expenses")
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attachments', function (Blueprint $table){
            $table->dropForeign("attachments_expense_id_foreign");
            $table->foreignId("expense_id")->change()
                ->constrained("expenses");
        });
    }
}
