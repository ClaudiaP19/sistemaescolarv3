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

echo "<h1>DATOS GUARDADOS</h1><br><a href='inicio.php?id_usuario={$_POST['id_usuario']}'>Regresar</a>";