const url = "../controllerhandler.php";

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
                window.location.replace("propriedade.php");
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

function CarregarPropriedades() {
    var dados = "tarefa=CarregarPropriedades";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                window.location.replace("propriedade.php");
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