<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

DB::table('calificaciones')
    ->where('id_calificacion',$_GET['id'])->delete();

echo "Se elimino la calificación con el id:{$_GET['id']}
<form action='consultar.php' method='post'>
    <input id='id_usuario' type='text' name='id_usuario' value='{$_GET['id_usuario']}' hidden>
    <input class='button' type='submit' value='Regresar al sistema escolar'>
</form>";
