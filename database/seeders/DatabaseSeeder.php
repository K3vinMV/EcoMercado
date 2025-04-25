<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario de prueba específico
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'test@admin.com',
            'password' => 'admin',
        ]);

        // Crear 10 usuarios más (con factory)
        $users = User::factory(10)->create();

        // Crear productos asociados a diferentes usuarios (20 productos)
        Producto::factory(20)->create()->each(function ($producto) use ($users) {
            $producto->user_id = $users->random()->id; // Asignar un usuario aleatorio
            $producto->save();
        });

        // Crear blogs asociados a diferentes usuarios (15 blogs)
        Blog::factory(15)->create()->each(function ($blog) use ($users) {
            $blog->user_id = $users->random()->id; // Asignar un usuario aleatorio
            $blog->save();
        });
    }
}
