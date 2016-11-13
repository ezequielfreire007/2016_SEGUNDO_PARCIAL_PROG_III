function Login() {

    var email = $("#email").val();
    var password = $("#password").val();
    var pagina = "./adminLogin.php";

    $.ajax({
        type:'post',
        url:pagina,
        dataType:'json',
        data:{email:email, password:password},
        async:true
    })
    .done(function(respuesta){
        alert(respuesta.esta);
        if (respuesta.esta) {
            window.location.href = "./principal.php";
        }
        else {
            alert("Error" +"<br>"+ respuesta);
        }
        return;
    })
    .fail(function (jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    })




}
