<?php

// database/migrations/xxxx_xx_xx_create_queries_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('api_address');
            $table->boolean('is_registered')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
