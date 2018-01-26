const url = "/AgroSeven/areas/cliente/controllerhandler.php";

function loginUsuario() {
    var dados = $("#formLoginDeUsuario").serialize();
    dados = dados + "&tarefa=loginUsuario";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                //Direcionar para uma nova página
                alert('Logado com o código de usuário:' + data.codigo);
            }
            else {
                alert('Erro:' + data.message);
            }
        },
        error: function(a, b, c) {
            console.log(c);
        }
    });
}