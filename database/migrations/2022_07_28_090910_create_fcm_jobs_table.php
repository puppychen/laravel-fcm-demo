<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcm_jobs', function (Blueprint $table) {
            $table->id();
            $table->string("identifier")
                ->comment("訊息來源id，實作應檢查不可重覆，目前為方便測試不限制");
            $table->timestamp("deliver_at");
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
        Schema::dropIfExists('fcm_jobs');
    }
};
