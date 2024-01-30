<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar la tabla antes de insertar nuevos datos
        DB::table('posts')->truncate();

        // Insertar datos de ejemplo
        DB::table('posts')->insert([
            'user' => 'noel', 
            'title' => 'Mi Primer Post',
            'content' => 'Este es el contenido de mi primer post en el blog. ¡Espero que les guste!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'user' => 'noel', 
            'title' => 'Viaje Increíble',
            'content' => 'Hoy tuve un viaje increíble y quería compartir mi experiencia con todos ustedes.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'user' => 'noel',
            'title' => 'Receta Deliciosa',
            'content' => 'Aquí está la receta de mi plato favorito. ¡Deberían probarlo!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
