<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->foreignIdFor(\App\Models\Category::class,"category_id");
            $table->string("name");
            $table->float("price");
            $table->float("old_price")->nullable();
            $table->text("lead");
            $table->text("description");
            $table->string("slug");
            $table->boolean("is_active");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
