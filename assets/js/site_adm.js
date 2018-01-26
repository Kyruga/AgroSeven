$(document).ready(function () {
    $('#menu-coluna li').click(function () {
        if (!$(this).hasClass('inactive')) {
            ChangeMenu($(this));
        }
    });
});

function ChangeMenu(target) {
    // $('#menu-coluna li').removeClass('active');
    // $(target).addClass('active');

    var id = target.attr("id");

    switch (id) {
        case "NovoAno":
            $("#FecharAnoSafra").fadeOut(function(){
                $('#NovoAnoSafra').fadeIn(function () {
                    //ResizeColumn();
                });
            });
            break;
        case "FecharAno":
            $("#NovoAnoSafra").fadeOut(function(){
                $('#FecharAnoSafra').fadeIn(function () {
                    //ResizeColumn();
                });
            });
            break;
    }
}

function LoadTableGlebas(element, glebas) {
    var html = "";
    var host = "http://" + window.location.host;
    host += "/agroseven/";

    $.each(glebas, function(key, glebaObj){
        html += "<div class='box-funcionario'><a href='#' onclick='EditarGleba(" +
        glebaObj.id + ")'><img src=" + host + "assets/img/foto-funcionario.svg' alt=''>" +
        "<div class='texto'><h1>" + glebaObj.nome + "</h1></div><img src=" + host +
        "assets/img/seta-dir-func.svg' class='seta-baixo' alt=''></a></div>";
    });

    element.append(html);
}

function loadSelectProperties(element, ObjList, id) {
    var html = "<select name='propriedadeId'> <option value=''>Selecione...</option>";
    var selectedId = (typeof id === 'undefined') ? 0 : id;

    $.each(ObjList, function(key, value){
        if(value.id == selectedId) {
            html += "<option value='" + value.id + "' selected>" + value.nome + "</option>";
        }
        else {
            html += "<option value='" + value.id + "'>" + value.nome + "</option>";
        }                
    });    

    element.append(html);
}

function LoadSistemaPlantioInfo(dropdown, SistemaPlantioList) {
    var html = "<div class='form-group'><div class='form-left'><label for=''>Sistema</label>" +
        "<input name='sistema' type='text'></div></div><div class='form-group'><div class='form-left'>" +
        "<label for=''>Idade</label><input name='vu_a_v' type='text'></div></div><div class='form-group'>" +
        "<div class='form-left'><label for=''>Colheita</label><input name='colheita' type='text'>" +
        "</div></div>";
}

function LinkParaTalhoes(id) {
    var html = "<a href='/AgroSeven/areas/administrativo/views/talhoes.php?id=" + id + "' class='btn btn-default'>Ver Talhões</a>";

    $("#linktalhao").empty();
    $("#linktalhao").append(html);
}