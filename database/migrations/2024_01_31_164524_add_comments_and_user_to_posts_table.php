<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsAndUserToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Añadir columna para el usuario del comentario
            $table->string('comentUser');

            // Añadir columna para los comentarios
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Revertir los cambios en caso de hacer rollback
            $table->dropColumn('comentUser');
            $table->dropColumn('comment');
        });
    }
}