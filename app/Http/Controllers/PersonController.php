<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PersonController extends Controller
{
    //
    public function index()
    {
        //el metodo Arr::add agrega ccalores a un arreglo
        $persons = ['nombre' => 'Alexis'];
        $persons = Arr::add($persons, 'numero', 6);

        //este metodo permite unir dos arreglos
        $nombres = ['nombre' => 'Alexis'];
        $telefonos = ['telefono' => '2851148475'];
        $datos = Arr::collapse([$nombres, $telefonos]);

        //el metodo Arr::divide retorna dos arreglos, uno va a contener
        //todas las llaves y el otro tendra todos los valores del arreglo
        [$keys, $values] = Arr::divide(['nombre' => 'Alexis']);

        //el metodo Arr::dot cambia los arreglos multidimensionales en
        //arreglos simples utilizando un punto para indicar el nivel
        //de profundidad de los valores
        $datos2 = Arr::dot(['carro' => ['marca' => 'honda', 'color' => 'negro']]);

        /**
         * el metodo Arr::except nos devuelve los valores del
         * arreglo exceptuando el valor de la llave que pasamos
         * como parametro:
         */
        $datos3 = ['marca' => 'honda', 'color' => 'negro'];
        $filtro = Arr::except($datos3, ['color']);

        /**
         * el metodo Arr::first regresa el primer elemento
         * de un array que cumpla una condicion dada.
         */
        $digits = [34, 56, 75];

        $first = Arr::first($digits, function ($value, $key) {
            return $value >= 40;
        });

        /**
         * El metodo Arr:flatten convierte en un
         * arreglo multidimensional en uno simple
         */
        $info2 = ['nombre' => 'Alexis', 'carro' => ['Audi', 'Azul']];
        $datos4 = Arr::flatten($info2);

        /**
         * el metodo Arr::forget elimina una llave dada, se
         * utiliza la notacion de puntos para identificar la
         * profundidad del arreglo. como primer parametro
         * recibe el arreglo y como segundo parametro la llave
         * que queremos olvidar.
         */
        $info3 = ['users' => ['admin' => 'Alexis', 'editor' => 'Luis']];
        Arr::forget($info3, 'users.editor');

        /**
         * este metodo comprueba si existe un determinado
         * elemento y retorna un valor booleano (utiliza
         * la notacion de puntos para identificar la
         * profundidad del arreglo)
         */
        $info4 = ['users2' => ['admin' => 'alexis', 'editor' => 'luis']];
        $admin = Arr::has($info4, 'users2.admin');

        /**
         * el metodo Arr::only solo nos devolvera aquellas
         * que especifiquemos dentro de un arreglo
         */
        $info5 = ['nombre' => 'laptop', 'precio' => 100, 'unidad' => 10];
        $datos5 = Arr::only($info5, ['nombre', 'unidades']);

        /**
         * este metodo devuelve un arreglo formado por los
         * valores de una llave dada perteneciente a otro
         * arreglo, se puede utilizar la notacion de puntos.
         */
        $info6 = [
            ['carro' => ['id' => 1, 'color' => 'azul']],
            ['carro' => ['id' => 2, 'color' => 'verde']]
        ];
        $color = Arr::pluck($info6, 'carro.color');

        /**
         * agregar un item al principio del arreglo
         */
        $numeros2 = ['uno', 'dos', 'tres', 'cuatro'];
        $numeros2 = Arr::prepend($numeros2, 'cero');

        /**
         * este metodo toma el valor de una llave
         * determinada y luego la borra del arreglo
         */
        $info7 = ['mascota' => 'perro', 'instrumento' => 'guitarra'];
        $mascota = Arr::pull($info7, 'mascota');

        /**
         * el metodo Arr::set se utiliza para cambiar
         * el valor de una llave determinada en un
         * arreglo
         */
        $info8 = ['productos' => ['carro' => ['color' => 'azul']]];
        Arr::set($info8, 'productos.carro.color', 'rosa');

        /**
         * el metodo Arr::sort ordena un arreglo por sus valores
         */
        $data = ['Alexis', 'Liz', 'Aria'];
        $orden = Arr::sort($data);

        /**
         * el metodo Arr::where devuelve un arreglo con los
         * elementos que pasen el filtro dado, como, por
         * ejemplo, retornar los valores del arreglo que
         * sean de tipo string
         */
        $array = [100, '200', 300, '400', 500];
        $filtered = Arr::where($array, function ($value, $key) {
            return is_string($value);
        });

        /**
         * esta funcion regresa el primer elemento de un
         * arreglo
         */
        $array2 = [100, 200, 300];
        $primero = head($array2);

        /**
         * esta duncion regresa el ultimo elemento
         * de un arreglo
         */
        $array3 = [100, 200, 300];
        $ultimo = last($array3);

        return view('person.person', compact('ultimo'));
    }
}
