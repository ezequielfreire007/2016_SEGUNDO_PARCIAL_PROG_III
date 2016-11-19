<?php
    require_once 'clases/Usuario.php';

    $retorno = NULL;
    $jsonObj = NULL;
    $objeto = isset($_POST['obj']) ? $_POST['obj']:NULL;

    $miUsuario = json_decode(json_encode($objeto));

    $usuarios = Usuario::TraerUsuarioLogueado($miUsuario);
    //$uls = array();

    //var_dump($usuarios);
    if ($usuarios != NULL) {
        //Agrego el usuario a la session

        $uls = new stdClass();
        $uls->id = $usuarios['id'];
        $uls->nombre = $usuarios['nombre'];
        $uls->email = $usuarios['email'];
        $uls->perfil = $usuarios['perfil'];
        $uls->foto = $usuarios['foto'];
        
        session_start();
        $_SESSION['uls'] = $uls;

        //genero un objeto json de respuesta
        $jsonObj['esta'] = TRUE;
        $jsonObj['id'] = $uls->id;
        $jsonObj['mensaje'] = "Se encuentra registrado en la base ";

    }else {
        $jsonObj['esta'] = FALSE;
        $jsonObj['id'] = 0;
        $jsonObj['mensaje'] = "No Coincide email y/o password";
    }


    $retorno = json_encode($jsonObj);

    echo $retorno;


 ?>
