<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

DB::table('calificaciones')
    ->where('id_calificacion',$_POST['id_calificacion'])
    ->update(['calificacion'=>$_POST['calificacion']]);

echo "Se actualizó la calificación del id: {$_POST['id_calificacion']}

<form action='consultar.php' method='post'>
           <input id='id_usuario' type='text' name='id_usuario' value='{$_POST['id_usuario']}' >
           <input class='button' type='submit' value='Regresar al sistema escolar'>
         </form>";