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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('target'); //email or phone
            $table->string('code');
            $table->enum('type',['email','phone'])->default('email');
            $table->timestamp('expires_at')->nullable();
            $table->morphs('user'); //user_id, user_type (user_id = 1, user_type = App\Models\User
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
        Schema::dropIfExists('otps');
    }
};
