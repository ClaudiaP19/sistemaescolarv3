<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$users= DB::table('calificaciones')
    ->leftJoin('alumnos','calificaciones.id_alumno','=','alumnos.id_alumno')
    ->get();

$promedio = DB::table('calificaciones')->avg('calificacion');
$promedio = number_format($promedio,1);
echo <<<_TABLE
<table class="table">
<thead>
    <th>#ID</th>
    <th>Calificación</th>
    <th>Alumno</th>
    <th colspan="2">Operaciones</th>
</thead>
<tfoot>
    <tr>
        <th>Promedio:</th>
        <th>$promedio</th>
    </tr>
</tfoot>
<tbody>
_TABLE;
foreach ($users as $fila){
    echo <<<_ROW
    <tr>
        <th>$fila->id_calificacion</th>
        <td><center>$fila->calificacion</center></td>
        <th>{$fila->nombre} {$fila->primer_apellido} {$fila->segundo_apellido}</th>
        <td><a class="button" href="delete.php?id_usuario={$_POST['id_usuario']}&id={$fila->id_calificacion}">ELIMINAR</a></td>
        <td>
            <form action="update.php" method="post">
                <input id="id_calificacion" type="text" name="id_calificacion" value="{$fila->id_calificacion}" hidden>
                <input id="calificacion" type="text" name="calificacion" size="3">
                <input id="id_usuario" type="text" name="id_usuario"  value="{$_POST['id_usuario']}" hidden>
                <input class="button" type="submit" value="ACTUALIZAR">
            </form>
        </td>
_ROW;

}
echo  "
</tbody>
</table>
<form action='inicio.php' method='post'>
                <input id='id_usuario' type='text' name='id_usuario' hidden value='{$_POST['id_usuario']}'  >
                <input class='button' type='submit' value='Regresar al sistema escolar'>
</form>";
