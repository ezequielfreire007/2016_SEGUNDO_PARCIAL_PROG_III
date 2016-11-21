


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
function CargarFormUsuario(id,btn) {//#4

        var pagina = "./administracion.php";
        var id = id;
        var queBoton = btn;

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'html',
            data:{queMuestro:"4",id:id,queBoton:queBoton},
            async:true
        })
        .done(function(respuesta){
            //alert(respuesta); 
            $("#divAbm").html(respuesta);     
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
}
function SubirFoto(id) {//#5
		var pagina = "./administracion.php";
        var foto = $("#archivo").val();
        var id;
        if(foto === ""){
            return;
        }

        var archivo = $("#archivo")[0];//foto[0];
        var formData = new FormData(); //permite subir archivos
        formData.append("archivo",archivo.files[0]);//configurar el objeto
        formData.append("queMuestro", "5");
        formData.append("id", id);


        $.ajax({
                type: 'post',
                url: pagina,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                async: true
        })
        .done(function (objJson) {
            if(!objJson.Exito){
                alert(objJson.Mensaje);

            }
            $("#divFoto").html(objJson.Mensaje);
            $("#hdnArchivoTemp").val(objJson.Mensaje);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }); 
}

function AgregarUsuario() {//#6
		
        var pagina = "./administracion.php";
        
        //var id = $("#hdnIdUsuario").val();
        var nombre = $("#txtNombre").val();
        var email = $("#txtEmail").val();
        var perfil = $("#cboPerfiles").val();
        var password = $("#txtPassword").val();
        var foto = $("#hdnFotoSubir").val();

        var obj = {"nombre":nombre,"email":email,"password":password,"perfil":perfil,"foto":foto};  

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'html',
            data:{queMuestro:"6", obj:obj},
            async:true
        })
        .done(function(respuesta){
            alert(respuesta);
            if (respuesta) { alert("Usuario modificado");} 
            MostrarGrilla();    
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
}

function EliminarUsuario(obj) {//#7
		var pagina = "./administracion.php";
        var id = obj;
        
        $.ajax({
            type:'post',
            url:pagina,
            dataType:'text',
            data:{queMuestro:"7",id:id},
            async:true
        })
        .done(function(respuesta){
            alert(respuesta); 
               
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
}
function ModificarUsuario() {//#8
        
        var pagina = "./administracion.php";
        
        var id = $("#hdnIdUsuario").val();
        var nombre = $("#txtNombre").val();
        var email = $("#txtEmail").val();
        var perfil = $("#cboPerfiles").val();
        var password = $("#txtPassword").val();
        var foto = $("#hdnFotoSubir").val();

        var obj = {"id":id,"nombre":nombre,"email":email,"password":password,"perfil":perfil,"foto":foto};        

        $.ajax({
            type:'post',
            url:pagina,
            dataType:'text',
            data:{queMuestro:"8",obj:obj},
            async:true
        })
        .done(function(respuesta){
            alert(respuesta);
            if (respuesta) { alert("Usuario modificado");}
            
            MostrarGrilla();
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        })
		
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
