<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->text('title');
            $table->bigInteger('isbn');

            $table->foreign('author_id')->references('id')->on('authors');
        });

        DB::statement('ALTER TABLE books MODIFY COLUMN isbn BIGINT (13);');

        Schema::table('books', function($table) {
            $table->foreignId('publisher_id');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->year('publication_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
