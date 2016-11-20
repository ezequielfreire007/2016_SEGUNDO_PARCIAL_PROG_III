<?php
    require_once 'verificar_sesion.php';
    require_once 'clases/Usuario.php';

    $id = isset($_POST['id']) ? $_POST['id']:NULL; //CARGGO OBJETO RECIBIDO DEL AJAX SI ES QUE TIENE
    $btn = "";
    $btnNombre = "";
    $user = NULL;
    $selectCob = Usuario::TraerTodosLosPerfiles();
    //var_dump($selectCob);


    if ($id == NULL) {
        $user = NULL;
         //$btn = "AgregarUsuario(obj)"
    }else
    {
        //modifico
        $users = Usuario::TraerUnUsuarioPorId($id);//retorna un array de un elemento
        //var_dump($users);
        foreach ($users as $value) {
            $user = $value;
        }
        //var_dump($user);
        $btn ="ModificarUsuario()";
        $btnNombre = "Modificar";
    }

    if ($user == $_SESSION['uls']) {
        //edito perfil
    }

?>
<div id="divFrm" class="animated bounceInLeft" style="height:330px;overflow:auto;margin-top:0px;border-style:solid">
    <input type="hidden" id="hdnIdUsuario" value="<?php echo $user->id; ?>" />
    <input type="text" placeholder="Nombre" id="txtNombre" value="<?php echo $user->nombre;?>"/>
    <input type="text" placeholder="E-mail" id="txtEmail" value="<?php  echo $user->email; ?>" />
    <input type="password" placeholder="Password" id="txtPassword" value="" />

    <span>Perfil</span>
    <select id="cboPerfiles" >
        <?php 

            $perfil = $_SESSION['uls']->perfil;
            var_dump($perfil);
            switch ($perfil) {
                case 'administrador':

                    //
                    foreach ($selectCob as $value) {
                        $selected = ($value->perfil == "administrador") ? " selected":"";
                        echo "<option value='".$value->perfil."'".$selected." >".$value->perfil."</option>";
                    }
                    break;
                case 'usuario':
                    foreach ($selectCob as $value) {
                        $selected = ($value->perfil == "usuario") ? " selected":"";
                        $disable = ($value->perfil == "administrador") ? "disabled":"";
                        echo "<option value='".$value->perfil."'".$selected." ".$disable." >".$value->perfil."</option>";
                    }
                    break;
                case 'invitado':
                    foreach ($selectCob as $value) {
                        $selected = ($value->perfil == "invitado") ? " selected":"";
                        $disable = ($value->perfil == "administrador" || $value->perfil == "usuario" ) ? "disabled":"";

                        echo "<option value='".$value->perfil."'".$selected." ".$disable." >".$value->perfil."</option>";
                    }
                    break;
                
                default:
                    
                    break;
            }

		?>	
    </select>
    <br/><br/>

    <input type="file" id="archivo" onchange="SubirFoto()" /> 

    <input type="button" class="MiBotonUTN" onclick="<?php echo $btn; ?>" value="<?php echo $btnNombre; ?>"  />
    <input type="hidden" id="hdnQueHago" value="agregar" />
</div>
<div id="divFoto"  class="animated bounceInLeft" style="border-style:none" >
    <div style="width:25%;float:left"></div>
    <div style="width:75%;float:right">

        <img id="fotoTmp" src="./fotos/<?php echo $user->foto; ?>" style="float:left" class="fotoform" />

        <input type="hidden" id="hdnFotoSubir" value="<?php //IMPLEMENTAR... ?>" />

    </div>
</div>