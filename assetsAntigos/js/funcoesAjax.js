function funcoesAjax() {

    this.function = function (functionName, objRetornoAjax) {
        switch (functionName) {
            case 'teste':
                var a = 5;
                var b = 9;
                c = a + b;

                var obj = new Object();

                obj.numero = c;
                obj.string = "teste variaveis";

                return obj;
                break;

            case 'checaLogin':
                G_Usuario = objRetornoAjax.Usuario;
                if (G_Usuario.TipoAcesso == 'Provisoria') this.mostraModal($('#trocarSenha'));
                else {
                    $('#corpo').css('visibility', 'visible');
                }
                break;
        }
    }
}