function Login() {

    var email = $("#email").val();
    var password = $("#password").val();
    var pagina = '../adminLogin.php';

    $.ajax({
        datatype:'json',
        pagina: pagina,
        data:{email:email, password:password},
        async: true
    })
    .done(funtion(respuesta){
        alert(respuesta);
        return;
    })
    .fail(function (jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    })


}
