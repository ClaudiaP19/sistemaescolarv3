<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
    ->leftJoin('perfiles','usuarios.id_perfil','=','perfiles.id_perfil')
    ->where('usuarios.id_usuario',$_POST['id_usuario'])
    ->first();

$alumnos = DB::table('alumnos')
    ->get();

$asignatura = DB::table('asignaturas')
    ->get();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sistema escolar</title>
    <link rel='stylesheet' href='node_modules/bulma/css/bulma.min.css'>

</head>
<body>
<div class="box">
    <div class="columns is-centered is-2">
        <div class="column is-half">
            <div class="notification is-link">
                <h1>Sistema escolar para el <?php echo $user->nombre_perfil ?> </h1>
            </div>

            <?php if($user->nombre_perfil == 'Profesor'){?>
                <h2>AGREGAR CALIFICACIÓN</h2>
                <form action='insertar.php' method="post">
                    <label for="calificacion">Calificación:</label>
                    <input id="calificacion" type="text" name="calificacion">
                    <input id="id_usuario" type="text" name="id_usuario" value="<?php echo $user->id_usuario ?>" hidden>
                    <label for="id_alumno">Alumno:</label>
                    <select id="id_alumno" name="id_alumno">
                        <?php
                        foreach ($alumnos as $fila)
                             echo "<option value='{$fila->id_alumno}'>$fila->nombre</option>";
                        ?>

                    </select>
                    <label for="id_alumno">Asignatura:</label>
                    <select id="id_asignatura" name="id_asignatura">
                        <?php
                        foreach ($asignatura as $fila)
                            echo "<option value='{$fila->id_asignatura}'>$fila->nombre_asignatura</option>";
                        ?>

                    </select>
                    <input class="button" type="submit" value="Guardar">
                </form>
            <?php } ?>
            <form action="consultar.php" method="post">
                <input id="id_usuario" type="text" name="id_usuario" value="<?php echo $user->id_usuario ?>" hidden>
                <input class="button" type="submit" value="Consultar">
            </form>
        </div>
    </div>
</div>
</body>


