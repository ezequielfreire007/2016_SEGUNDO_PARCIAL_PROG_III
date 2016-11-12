<?php
    require_once 'Usuario.php';
    /////////////////////////////////////////////////////////////////////
    echo "TraerTodosLosPerfiles"."<br>";
    $perfiles = Usuario::TraerTodosLosPerfiles();
    var_dump($perfiles);
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "TraerTodosLosUsuarios"."<br>";
    $usuarios = Usuario::TraerTodosLosUsuarios();
    var_dump($usuarios);
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "TraerUnUsuarioPorId"."<br>";
    $usuario = Usuario::TraerUnUsuarioPorId(1);
    var_dump($usuario);
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "Agregar"."<br>";
    $usuario = new Usuario();
    $usuario->nombre = "Pepe";
    $usuario->email = "pepe@gmail.com";
    $usuario->password = "1234";
    $usuario->perfil = "administrador";
    $usuario->foto = "4";

    $miUlitmoUsuario = Usuario::Agregar($usuario);
    var_dump($miUlitmoUsuario);
    /////////////////////////////////////////////////////////////////////
    echo "Borrar"."<br>";
    Usuario::Borrar(5);
    var_dump(Usuario::TraerTodosLosUsuarios());
 ?>
