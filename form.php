<?php
    require_once 'verificar_sesion.php';
    require_once 'clases/Usuario.php';

    $id = isset($_POST['id']) ? $_POST['id']:NULL; //CARGGO ID RECIBIDO DEL AJAX SI ES QUE TIENE
    $queBoton = isset($_POST['queBoton']) ? $_POST['queBoton']:NULL;
    // var_dump($queBoton);
    $perfil = $_SESSION['uls']->perfil; 
    $disableText = ($perfil != "administrador") ? "disabled":"";  
    $btn = "";
    $btnNombre = "";
    $user = NULL;
    $selectCob = Usuario::TraerTodosLosPerfiles();

    switch ($queBoton) {
        case "1": //MODIFICAR
            //modifico
            $users = Usuario::TraerUnUsuarioPorId($id);//retorna un array de un elemento
            //var_dump($users);
            foreach ($users as $value) {
                $user = $value;
            }
            $_GET['imatmp'] = $user->foto;
            // var_dump($user->perfil);
            $btn ="ModificarUsuario()";
            $btnNombre = "Modificar";
            break;
        case "2": //EELIMINAR
            $user = Usuario::TraerUnUsuarioPorId($id);
            foreach ($users as $value) {
                $user = $value;
            }
            $btn ="EliminarUsuario(".$user->id.")";
            $btnNombre = "Eliminar";
            break;
        case "3": //EDITAR
            $user = $_SESSION['uls'];
            $btn ="EditarUsuario()";
            $btnNombre = "Editar";
            break;
        case "4": //AGREGAR
            $user = new Usuario();

            $user->nombre = " ";
            $user->email = " ";
            $user->perfil = " ";
            $_GET['imatmp'] = "pordefecto.jpg";
            $btn ="EditarUsuario()";
            $btnNombre = "Editar";
            break;
    }
?>
<div id="divFrm" class="animated bounceInLeft" style="height:330px;overflow:auto;margin-top:0px;border-style:solid">
    <input type="hidden" id="hdnIdUsuario" value="<?php echo $user->id." ". $disableText ; ?>" <?php echo $disableText; ?>/>
    <input type="text" placeholder="Nombre" id="txtNombre" value="<?php echo $user->nombre;?>" <?php echo $disableText; ?>/>
    <input type="text" placeholder="E-mail" id="txtEmail" value="<?php  echo $user->email; ?>" <?php echo $disableText; ?>/>
    <input type="password" placeholder="Password" id="txtPassword" value="" />

    <span>Perfil</span>
    <select id="cboPerfiles" >
        <?php        
            
            switch ($perfil) {
                case 'administrador':

                    foreach ($selectCob as $value) {
                        $selected = ($user->perfil == $value->perfil) ? " selected":"";
                        echo "<option value='".$value->perfil."'".$selected." >".$value->perfil."</option>";
                    }
                    break;
                case 'usuario':
                    foreach ($selectCob as $value) {
                        $selected = ($user->perfil == $value->perfil) ? " selected":"";
                        //$disable = ($value->perfil == "administrador" || $value->perfil == "invitado") ? "disabled":"";
                        echo "<option value='".$value->perfil."'".$selected." disabled >".$value->perfil."</option>";
                    }
                    break;
                case 'invitado':
                    foreach ($selectCob as $value) {
                        $selected = ($user->perfil == $value->perfil) ? " selected":"";
                        //$disable = ($value->perfil == "administrador" || $value->perfil == "usuario" ) ? "disabled":"";
                        echo "<option value='".$value->perfil."'".$selected." disabled >".$value->perfil."</option>";
                    }
                    break;
                
                default:
                    
                    break;
            }

		?>	
    </select>
    <br/><br/>

    <input type="file" id="archivo" onchange="SubirFoto(<?php echo $id; ?>)" /> 

    <input type="button" class="MiBotonUTN" onclick="<?php echo $btn; ?>" value="<?php echo $btnNombre; ?>"  />
    <input type="hidden" id="hdnQueHago" value="agregar" />
</div>
<div id="divFoto"  class="animated bounceInLeft" style="border-style:none" >
    <div style="width:25%;float:left"></div>
    <div style="width:75%;float:right">

        <img id="fotoTmp" src="./fotos/<?php echo $_GET['imatmp']; ?>" style="float:left" class="fotoform" />

        <input type="hidden" id="hdnFotoSubir" value="<?php echo $_GET['imatmp']; ?>" />

    </div>
</div>