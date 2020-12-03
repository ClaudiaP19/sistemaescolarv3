<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$users= DB::table('calificaciones')
    ->leftJoin('alumnos','calificaciones.id_alumno','=','alumnos.id_alumno')
    ->leftJoin('asignaturas','asignaturas.id_asignatura','=','calificaciones.id_asignatura')
    ->where('alumnos.id_usuario',$_POST['id_usuario'])
    ->get();

$promedio = DB::table('calificaciones')->avg('calificacion');
$promedio = number_format($promedio,1);
echo "<h1>Consulta de calificaciones</h1>";
echo <<<_TABLE
<table class="table">
<thead style="background-color: papayawhip">
    <th>#ID</th>
    <th>Materia</th>
    <th>Calificación</th>
    <th>Alumno</th>
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
        <th>$fila->nombre_asignatura</th>
        <td><center>$fila->calificacion</center></td>
        <th>{$fila->nombre} {$fila->primer_apellido} {$fila->segundo_apellido}</th>

_ROW;

}
echo  "
</tbody>
</table>";

