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
		  
            $usuarios = Usuario::TraerTodosLosUsuarios();
            //var_dump($usuarios);
            $tabla = "";
            
            foreach ($usuarios as $usuario) {
                $tabla = "<tr>";
                $tabla .=    "<td>". $usuario->nombre ."</td>";
                $tabla .=    "<td>". $usuario->email ."</td>";
                $tabla .=    "<td>". $usuario->perfil ."</td>";
                $tabla .=    "<td><img src='./fotos/". $usuario->foto."'width='80px' height='80px'/></td>";
                $tabla .=    "<td>";

                if ($_SESSION['uls']->perfil != "invitado") {
                    if ($_SESSION['uls']->perfil == "administrador") {
                        $tabla .= "<input type='button' class='MiBotonUTN' onclick='CargarFormUsuario(".$usuario->id .") ' value='Modificar'/>";
                        $tabla .= "<input type='button' class='MiBotonUTN' onclick='EditarUsuario(".$usuario->id.")' value='Eliminar'/>";
                    }
                    else
                    {
                        $tabla .= "<input type='button' class='MiBotonUTN' onclick='CargarFormUsuario(".$usuario->id .") ' value='Modificar'/>";
                    }
                    
                     
                }

                $tabla .= "</td>";
                        
                $tabla .="</tr>";
                echo $tabla;
            }
		?>

    </table>
</div>	