$(document).ready(function(){
    //$("#divGrilla").hide(); //no muestra la grilla
})


function Logout() {//#2

        var pagina = "./administracion.php";

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'text',
            data:{queMuestro:"2"},
            async:true
        })
        .done(function(respuesta){
            //alert(respuesta);
            window.location.href = "./login.php";
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })

}
function MostrarGrilla() {//#3

        var pagina = "./administracion.php";

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'html',
            data:{queMuestro:"3"},
            async:true
        })
        .done(function(respuesta){
            //alert(respuesta); 
            $("#divGrilla").html(respuesta);     
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
}
function Home() {//#3-sin case
	    window.location.href = "./principal.php";
}
function CargarFormUsuario(id) {//#4
	   var pagina = "./administracion.php";
       var id = id;
       

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'html',
            data:{queMuestro:"4", id:id},
            async:true
        })
        .done(function(respuesta){
            alert(respuesta); 
            $("#divAbm").html(respuesta);     
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
}
function SubirFoto() {//#5
		//IMPLEMENTAR...
}
function AgregarUsuario(obj) {//#6
		//IMPLEMENTAR...
}
function EditarUsuario() {//#7 sin case
		//IMPLEMENTAR...
}
function EliminarUsuario(obj) {//#7
		//IMPLEMENTAR...
}
function ModificarUsuario() {//#8
		//IMPLEMENTAR...
}
function ElegirTheme() {//#9
		//IMPLEMENTAR...
}
function AplicarTheme(radio) {//sin case
		//IMPLEMENTAR...
}
function GuardarTheme() {//#10
		//IMPLEMENTAR...
}
