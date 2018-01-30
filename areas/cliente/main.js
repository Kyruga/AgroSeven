const url = "../controllerhandler.php";

function cadastroInicialUsuario() {
    var dados = $('#formCadastroDeUsuario').serialize();
    dados = dados + "&tarefa=cadastrarNovoUsuario";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                alert('usuario salvo com sucesso por favor atualize seus dados');
                window.location = "./meus-dados.php";
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

function alterarDadosUsuario() {
    debugger;
    var dados = $("#form-dados-pessoais").serialize();
    dados = dados + "&" + $("#form-endereco").serialize();
    dados = dados + "&tarefa=alterarDadosUsuario";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                $(".lado-dir :input[type='text']").prop( "readonly", true );
                $(".lado-dir :input[type='email']").prop( "readonly", true );
                $(".lado-dir :input[type='password']").prop( "readonly", true );
                $('.btn-alterar-meus-dados').css('display','inline');
                $('.btns-editar').css('display','none');
                alert('dados usuario alterados com sucesso');
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

function cadastroPropriedade() {
    var dados = $("#formCadastroPropriedade").serialize();

    dados = dados + "&tarefa=cadastrarPropriedade";
    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                alert('Salvou no codigo:' + data.codigo);
                window.location = "./localizacao.php";
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

function cadastroLocalizacaoPropriedade() {
    debugger;
    var dados = $("#formLocalizacaoNovaPropriedade").serialize();

    dados = dados + "&tarefa=salvarNovoLocalPropriedade";
    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                alert('Salvou no codigo:' + data.codigo);
                window.location = "./localizacao.php";
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

function CarregarGlebas() {
    var dados = "&tarefa=ListarGlebas";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {

                $("#create").fadeOut(function(){
                    $("#dropdownPropriedades").empty();
                    $("#update").fadeOut(function(){
                        $("#dropdownPropriedadesEdit").empty();
                    });
                    $("#delete").fadeOut();
                    $("#index").fadeIn();
                });

                var table = $("#index");

                LoadTableGlebas(table, data.glebas);

                CarregarSistemaPlantio();
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

function AdicionarGleba() {
    CarregarPropriedades();    

    $("#index").fadeOut(function(){
        $("#index").empty();
        $("#update").fadeOut();
        $("#delete").fadeOut();
        $("#create").fadeIn();
    });
}

function EditarGleba(id) {
    var dados = "id=" + id + "&tarefa=EditarGleba";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                CarregarPropriedades(data.gleba.propriedade_id);
                LinkParaTalhoes(data.gleba.id);
                $("#inputHiddenId").val(data.gleba.id);
                $("#inputTxtNome").val(data.gleba.nome);

                $("#index").fadeOut(function(){
                    $("#index").empty();
                    $("#create").fadeOut(function(){
                        $("#dropdownPropriedades").empty();
                    });
                    $("#delete").fadeOut();
                    $("#update").fadeIn();
                });
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

function SalvarEditGleba() {
    var dados = $("#formEditarGleba").serialize();
    var dados = dados + "&tarefa=SalvarEditGleba";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                CarregarGlebas();                
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

function CarregarPropriedades(id) {
    var dados = "&tarefa=carregarPropriedades";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                var select = (typeof id === 'undefined') ? $("#dropdownPropriedades") : $("#dropdownPropriedadesEdit");

                loadSelectProperties(select, data.propriedades, id);                
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

function SalvarGleba() {
    var dados = $("#formNovaGleba").serialize();
    var dados = dados + "&tarefa=SalvarGleba";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                CarregarGlebas();                
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

function CarregarTalhoes(id) {
    var dados = "id=" + id + "&tarefa=CarregarTalhoes";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {

                $("#create").fadeOut(function(){
                    //$("#dropdownPropriedades").empty();
                    $("#update").fadeOut(function(){
                        //$("#dropdownPropriedadesEdit").empty();
                    });
                    $("#delete").fadeOut();
                    $("#index").fadeIn();
                });

                //var table = $("#index");

                //LoadTableGlebas(table, data.glebas);
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

function carregarDadosUsuario(id) {
    var dados = "id=1&tarefa=carregarDadosUsuario";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                $("#form-dados-pessoais .nome").val(data.dados.nome);
                $("#form-dados-pessoais .email").val(data.dados.email);
                $("#form-dados-pessoais .cpf").val(data.dados.cpf);
                $("#form-dados-pessoais .rg").val(data.dados.rg);
                $("#form-dados-pessoais .telefone").val(data.dados.telefone);
                $("#form-endereco .endereco").val(data.dados.endereco);
                $("#form-endereco .numero").val(data.dados.numero);
                $("#form-endereco .bairro").val(data.dados.bairro);
                $("#form-endereco .cidade").val(data.dados.cidade);
                $("#form-endereco .estado").val(data.dados.estado);
                $("#form-endereco .cep").val(data.dados.cep);
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

function CarregarSistemaPlantio() {
    var dados = "tarefa=CarregarSistemaPlantio";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {

                var form = $("#dropdownSistemaPlantio");

                CarregarSelectSistemaPlantio(form, data.SistemaPlantio);
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

function CarregarInfoSistemaPlantio(valor) {

    var dados = "id=" + valor + "&tarefa=CarregarInfoSistemaPlantio";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                $("#sistema").val(data.SistemaPlantio.sistema);
                $("#vu_a_v").val(data.SistemaPlantio.vu_a_v);
                $("#colheita").val(data.SistemaPlantio.colheita);
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