<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require  'config\database.php';

$user = DB::table('usuarios')
    ->leftJoin('perfiles','usuarios.id_perfil','=', 'perfiles.id_perfil')
    ->where('nombre_usuario',$_POST['usuario'])->first();

$mensaje = '';
if($user->password == $_POST['password']){
    $mensaje = "<h1>Bienvenido {$user->nombre_perfil}: {$user->nombre_usuario}</h1>
    <br>
    <a href='inicio.php?id_usuario={$user->id_usuario}'>Entrar al sistema escolar</a>";
}
else{
    $mensaje = "<h1>Usuario y contraseña erroneos, por favor verifique y vuelva autentificarse </h1>
    <br>
    <a href='index.html'>Regresar</a>";
}

echo $mensaje;