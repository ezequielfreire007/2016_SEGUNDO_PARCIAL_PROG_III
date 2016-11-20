<?php
    require_once 'verificar_sesion.php';
    require_once 'clases/Usuario.php';
?>
<div class="animated bounceInRight" style="height:460px;overflow:auto;border-style:solid" >
    <table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th> NOMBRE </th>
                <th> MAIL </th>
                <th> PERFIL </th>
                <th> FOTO </th>
                <th> ACCION </th>
            </tr> 
        </thead>   	
        <?php
		    $perfil = $_SESSION['uls']->perfil;
            $usuarios = Usuario::TraerTodosLosUsuarios();
            $tabla = "";
            switch ($perfil) {
                case 'administrador':
                    foreach ($usuarios as $usuario) {
                        $tabla = "<tr>";
                        $tabla .=    "<td>". $usuario->nombre ."</td>";
                        $tabla .=    "<td>". $usuario->email ."</td>";
                        $tabla .=    "<td>". $usuario->perfil ."</td>";
                        $tabla .=    "<td><img src='./fotos/". $usuario->foto."'width='80px' height='80px'/></td>";
                        $tabla .=    "<td><input type='button' class='MiBotonUTN' onclick='ModificarUsuario()' value='Modificar'/><input type='button' class='MiBotonUTN' onclick='".$usuario->id."' value='Eliminar'/></td>";
                        $tabla .="</tr>";

                        echo $tabla;
                    }
                    break;
                case 'usuario':
                    # code...
                    break;
                case 'invitado':
                    # code...
                    break;
                default:
                    # code...8
                    break;
            }

            
		?>

    </table>
</div>	