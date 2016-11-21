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
    foreach ($usuarios as $value) {
        echo $value->email;
    }
    //var_dump($usuarios);
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "TraerUnUsuarioPorId"."<br>";
    $usuario = Usuario::TraerUnUsuarioPorId(1);
    var_dump($usuario);
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "Agregar"."<br>";
    $usuario = new Usuario(4);
    $usuario->nombre = "Pepe";
    $usuario->email = "pepe@gmail.com";
    $usuario->password = "1234";
    $usuario->perfil = "administrador";
    $usuario->foto = "4.jpg";

   // $miUlitmoUsuario = Usuario::Agregar($usuario);
    //var_dump($miUlitmoUsuario);
    //echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "Borrar"."<br>";
    //Usuario::Borrar(5);
    //var_dump(Usuario::TraerTodosLosUsuarios());
    echo "<br><br>";
    /////////////////////////////////////////////////////////////////////
    echo "TraerUsuarioLogueado".'<br>';
    $obj = new stdClass();
    $obj->email = "user@user.com";
    $obj->password = "123456";
    echo "<br>";
    //$usuario = Usuario::TraerUsuarioLogueado($obj);
    //var_dump($usuario);
    echo "<br><br>";
    echo exec('whoami');
    /////////////////////////////////////////////////////////////////////
    echo "ModificarUsuario".'<br>';
    $usuario->perfil = "usuario";
    $usuario->email = "pepe@hotmail.com";
    echo Usuario::Modificar($usuario);
 ?>
