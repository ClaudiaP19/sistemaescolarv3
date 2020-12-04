<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require  'config\database.php';

$user = DB::table('usuarios')
    ->leftJoin('perfiles','usuarios.id_perfil','=', 'perfiles.id_perfil')
    ->where('nombre_usuario',$_POST['usuario'])->first();

$mensaje = '';
if($user and $user->password == $_POST['password']){

    if($user->id_perfil == 1){
        $mensaje ="<h1>Bienvenido {$user->nombre_perfil}: {$user->nombre_usuario}</h1><br><form action='inicio.php' method='post'>
                <input id='id_usuario' type='text' name='id_usuario' value='{$user->id_usuario}' hidden>
                <input class='button' type='submit' value='Entrar al sistema escolar'></form>";
    }
    else{
        $mensaje = "<h1>Bienvenido {$user->nombre_perfil}: {$user->nombre_usuario}</h1><br><form action='consultar_alumno.php' method='post'>
                <input id='id_usuario' type='text' name='id_usuario' value='{$user->id_usuario}' hidden>
                <input class='button' type='submit' value='Consultar mis calificaciones'>
            </form>";


}
}
else{
    $mensaje = "<h1>Usuario y contraseña erroneos, por favor verifique y vuelva autentificarse </h1>
    <br>
    <a href='index.html'>Regresar</a>";
}

echo $mensaje;