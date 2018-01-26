function cadastroFuncionario() {
    var dados = $('#formCadastroPropriedade').serialize();

    var caminho = new Object();
    caminho.modulo = 'administrativo';
    caminho.controlador = 'funcionario';
    caminho.tarefa = 'cadastrar';

    ajax(dados, tarefa);
}

function cadastroPropriedade() {
    var dados = $("#formCadastroPropriedade").serialize();

    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
    dados = dados + "&tarefa=cadastrarPropriedade";
    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {
                alert('Salvou no codigo:' + data.codigo);
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    CarregarSistemaPlantio();

    $("#index").fadeOut(function(){
        $("#index").empty();
        $("#update").fadeOut();
        $("#delete").fadeOut();
        $("#create").fadeIn();
    });
}

function EditarGleba(id) {
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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
    var url = "/AgroSeven/areas/administrativo/controllerhandler.php";
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

function CarregarSistemaPlantio() {
    var url = "../controllerhandler.php";
    var dados = "tarefa=CarregarSistemaPlantio";

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados,
        success: function(data) {
            if(!data.error) {

                var dropdown = $("#SistemaPlantioInfo");

                LoadSistemaPlantioInfo(dropdown, data.SistemaPlantio);
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