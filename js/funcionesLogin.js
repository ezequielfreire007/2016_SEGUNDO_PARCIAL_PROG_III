function Login() {

    var email = $("#email").val();
    var password = $("#password").val();
    var pagina = './adminLogin.php';

    $.ajax({
        type: 'post',
        pagina: pagina,
        datatype:'json',
        data:{email:email, password:password},
        async: true
    })
    .done(function(respuesta){
        alert(respuesta);
        if () {

        }
        return;
    })
    .fail(function (jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    })


}
