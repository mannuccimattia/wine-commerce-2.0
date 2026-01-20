<?php

use App\Models\Category;
use App\Models\Denomination;
use App\Models\Region;
use App\Models\Winemaker;
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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->decimal('price', 10, 2);
            $table->decimal('alcohol', 4, 2);
            $table->decimal('bottle_size', 4, 3);
            $table->integer('vintage');
            $table->integer('stock');
            $table->string('image_front_url');
            $table->string('image_back_url');
            $table->string('grapes');
            $table->integer('bottle_condition');
            $table->integer('label_condition');
            $table->string('temperature');
            $table->text('description');
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Region::class)->constrained();
            $table->foreignIdFor(Winemaker::class)->constrained();
            $table->foreignIdFor(Denomination::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
