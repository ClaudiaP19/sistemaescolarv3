<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

DB::table('calificaciones')->insert(
    ['calificacion'=>$_POST['calificacion'],
        'id_alumno'=>$_POST['id_alumno'],
        'id_asignatura'=>$_POST['id_asignatura']
        ]
);

echo "<h1>DATOS GUARDADOS </h1><br><form action='inicio.php' method='post'>
                <input id='id_usuario' type='text' name='id_usuario' value='{$_POST['id_usuario']}' hidden>
                <input class='button' type='submit' value='Regresar al sistema escolar'></form>";