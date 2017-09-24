<?php

use App\Publicaciones;
use Illuminate\Database\Seeder;

class PublicacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pub = new Publicaciones();
        $pub->titulo = 'Hola Mundo';
        $pub->intro = 'Este es una publicación de pruebas. Puedes borrarlo en el panel de administración';
        $pub->url = 'hola-mundo';
        $pub->publicacion = 'fake.pdf';
        $pub->user_id = 1;
        $pub->publicado = 1;
        $pub->save();
    }
}
