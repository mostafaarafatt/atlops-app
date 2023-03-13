<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Accounts\Entities\User;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Entities\SubCategory;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('expected_start_price')->nullable();
            $table->double('expected_end_price')->nullable();
            $table->double('phone')->nullable();
            $table->enum('type', ['individual', 'company']);
            $table->enum('contact_type', ['phone', 'chat'])->nullable();
            $table->unsignedBigInteger('quantity');
            $table->tinyInteger('status');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(SubCategory::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Service::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
}
