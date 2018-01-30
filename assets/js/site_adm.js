$(document).ready(function () {
    $('#menu-coluna li').click(function () {
        if (!$(this).hasClass('inactive')) {
            ChangeMenu($(this));
        }
    });
});

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function ConvertToDecimal(n) {
    if(n.indexOf(",") !== -1) {
        n = n.replace(',', '.');
    }

    return parseFloat(n);
}

function ParseFloatToString(n) {
    return Number(parseFloat(n).toFixed(2)).toLocaleString('latn', {
        minimumFractionDigits: 2
    });
}

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

function CarregarSelectSistemaPlantio(element, ObjList, id) {
    var html = "<select name='sistemaplantio_id' onchange='CarregarInfoSistemaPlantio(this.value)'> <option value=''>Selecione...</option>";
    var selectedId = (typeof id === 'undefined') ? 0 : id;

    $.each(ObjList, function(key, value){
        if(value.id == selectedId) {
            html += "<option value='" + value.id + "' selected>" + value.sistema + "</option>";
        }
        else {
            html += "<option value='" + value.id + "'>" + value.sistema + "</option>";
        }                
    });    

    element.empty();
    element.append(html);
}

function LoadSistemaPlantioInfo(form, SistemaPlantio) {

    $(form + " #sistema").val(SistemaPlantio.sistema);
    $(form + " #vu_a_v").val(SistemaPlantio.vu_a_v);
    $(form + " #colheita").val(SistemaPlantio.colheita);
}

function LinkParaTalhoes(id) {
    var html = "<a href='/AgroSeven/areas/cliente/views/talhoes.php?id=" + id + "' class='btn btn-default'>Ver Talhões</a>";

    $("#linktalhao").empty();
    $("#linktalhao").append(html);
}

function CalcularNumeroPlantas() {
    var area = $("#area").val();
    var rua = $("#rua").val();
    var planta = $("#planta").val();

    area = ConvertToDecimal(area);
    rua = ConvertToDecimal(rua);
    planta = ConvertToDecimal(planta);

    if(isNumber(area) && isNumber(rua) && isNumber(planta)) {        

        var numeroPlantas = (area * 10000) / (rua * planta);

        $("#numeroplantas").val(parseInt(numeroPlantas));
    }
    else {
        $("#numeroplantas").val(0);
    }   
}

function CalcularSacas() {
    var area = $("#area").val();
    var sacaHectare = $("#sacahectare").val();
    var numeroPlantas = $("#numeroplantas").val();

    area = ConvertToDecimal(area);
    sacaHectare = ConvertToDecimal(sacaHectare);
    numeroPlantas = ConvertToDecimal(numeroPlantas);

    if(isNumber(area) && isNumber(sacaHectare) && isNumber(numeroPlantas)) {
        var saca = sacaHectare * area;
        var stand = numeroPlantas / area;
        var lpi = (saca * 480) / numeroPlantas;

        $("#stand").val(ParseFloatToString(stand));
        $("#lpi").val(ParseFloatToString(lpi));
        $("#saca").val(ParseFloatToString(saca));
    }
    else {
        $("#stand").val(0);
        $("#lpi").val(0);
        $("#saca").val(0);
    }
}