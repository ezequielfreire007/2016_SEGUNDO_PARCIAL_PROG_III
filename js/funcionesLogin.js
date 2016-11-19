function Login() {

    var email = $("#email").val();
    var password = $("#password").val();
    var obj = { "email":email, "password":password };
    var pagina = "./adminLogin.php";

    $.ajax({
        type:'post',
        url:pagina,
        dataType:'json',
        data:{obj:obj},
        async:true
    })
    .done(function(respuesta){
        if (respuesta.esta) {
            window.location.href = "./principal.php";
        }
        else {
            alert("Error" +"<br>"+ respuesta.mensaje);
        }
        return;
    })
    .fail(function (jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    })

}
