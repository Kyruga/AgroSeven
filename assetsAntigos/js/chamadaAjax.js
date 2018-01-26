function chamadaAjax() {

    var g_Usuario = false;
    var erro = new Erro();

    this.chamada = function (acao, data, functionName) {

        $.ajax({
            url: 'ajax.php?tarefa=' + acao,
            type: 'POST',
            data: data,
            success: function (r) {
                $('#preLoading').css('visibility', 'hidden');
                try {
                    js = jQuery.parseJSON(r);
                    console.log(js);
                    if (js.Resposta == 'LOGAR') this.mostraModal($('#login'));
                    else if (js.Resposta == 'SUCESSO') {

                        var objFuncoes = new funcoesAjax();
                        objFuncoes.function(functionName, js);
                        alert('teste');

                    } else erro.erro('Resposta inesperada', js, r);
                } catch (e) {
                    erro.erro('Não é json:', r, e);
                }
            },
            error: function (a, b, c) { erro.erro(a, b, c) }
        });
    }
}

