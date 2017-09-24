<?php

use App\Notas;
use Illuminate\Database\Seeder;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notas = new Notas();
        $notas->titulo = 'Hola Mundo';
        $notas->intro = 'Este es un post de pruebas. Puedes borrarlo en el panel de administración';
        $notas->texto = '<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus hendrerit faucibus purus. Curabitur a turpis metus. Maecenas ac sapien interdum, ullamcorper velit sed, ornare mi. Morbi placerat fermentum lorem pellentesque efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. Nulla tincidunt odio vitae convallis finibus.
        </p>
        <p>
        Donec nec libero egestas, sodales diam quis, rhoncus elit. Nam sit amet rutrum lorem, et pretium neque. Donec facilisis feugiat varius. Integer id ornare diam. Curabitur at nunc quis sapien porttitor elementum. Ut quis felis vestibulum, maximus felis in, varius diam. Etiam quis ipsum quis ante pretium suscipit. Etiam mollis volutpat massa, a hendrerit nisl commodo vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor diam vitae urna congue, vitae feugiat tortor venenatis. Maecenas tempus aliquam ipsum, vitae pharetra augue fringilla varius. Morbi vel arcu nibh.
        </p>
        <p>
        Sed maximus arcu placerat quam tempus fringilla. In accumsan, ex in tincidunt molestie, libero mi vehicula justo, ac cursus justo augue vitae arcu. Vivamus tempus scelerisque egestas. Integer dictum, arcu eget congue molestie, orci nisi tristique lectus, in sollicitudin tortor odio vitae tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac est vehicula, euismod lectus a, semper risus. Maecenas commodo egestas enim, sit amet faucibus lorem iaculis eget. Quisque ullamcorper posuere metus ut egestas. Morbi aliquet velit gravida purus commodo pellentesque. Nullam laoreet finibus orci, ut scelerisque eros dictum in. Nam at ullamcorper tortor. Quisque imperdiet elit sit amet arcu maximus bibendum. Nunc nec augue ac enim luctus elementum.
        </p>
        <p>
        Etiam mollis augue ut porttitor efficitur. Praesent nunc nisi, rutrum eu laoreet ut, fermentum eget lacus. Proin volutpat nulla pharetra, lacinia neque eget, tincidunt dui. Aliquam finibus placerat libero, sed gravida risus tincidunt non. Sed gravida bibendum ornare. Pellentesque sollicitudin, magna sed ornare tempor, leo elit tristique metus, eu convallis ligula orci sit amet ex. Vestibulum eleifend purus dolor. Praesent ullamcorper tortor non elit pulvinar, sed tempus massa porttitor. Fusce eu rutrum justo, ut imperdiet sem. Cras congue aliquam vehicula.
        </p>
        <p>
        Cras sed augue iaculis, tempor elit sed, ultricies urna. Nunc sagittis velit ac dolor venenatis, in fringilla lectus blandit. Praesent porttitor, lorem id bibendum egestas, justo nibh aliquet ante, et iaculis urna nunc nec massa. Donec id tortor et nibh posuere pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur eu tincidunt purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
        </p>';
        $notas->url = 'hola-mundo';
        $notas->user_id = 1;
        $notas->publicado = 1;
        $notas->save();
    }
}
