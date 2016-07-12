$(document).on('ready', principal);

function principal(){
    $sintomas = $('#noAsignados');
    $buscador = $('#search');
    $paginacion = $('.pagination');

    $buscador.on('input',buscarSintoma);

    $.getJSON('diagnostico/all', function (data) {
        full_data = data;
        for(var i = 0; i<full_data.length; i++)
        {
            full_data[i].noasignado = true;
        }
        console.log(data);
        loadSintomasSource(full_data);
        mostrarPagina(1);
        incializarNextBack()
    });
}

var full_data;
var values = [];
var origen = [];
var destino = [];
var html = [];

function incializarNextBack(){
    $('#next').on('click',function nextPage(){
        var pagina = $(this).parent().parent().find('li.active').attr("id");
        var ultima = $(this).parent().prev().attr("id");
        if(pagina<ultima)
            mostrarPagina(parseInt(pagina)+1);
    });
    $('#back').on('click',function nextPage(){
        var pagina = $(this).parent().parent().find('li.active').attr("id");
        if(pagina>1)
            mostrarPagina(parseInt(pagina)-1);
    });
}

function loadSintomasSource(data){
        var pag = 0;
        var j = 0;
        html[0] = '';
        for (var i = 0; i < data.length; ++i) {
            if(data[i].noasignado){
                if (j != 0 && j % 6 == 0) {
                    pag++;
                    html[pag] = '';
                }
                html[pag] += '<div data-detalle="' + data[i].id + '" class="sintoma col-md-4 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/' + data[i].imagen + '" style="height: 100px" onclick="showDescription(\'' + data[i].descripcion + '\')"/><label class="checkbox" style="font-size : 10px;"><input type="checkbox" data-toggle="checkbox" name="origen" value="' + data[i].id + '" />' + data[i].name + '</label></div>';
                j++;
            }
        }

        var pgntr = '<li id="backentorn"><a id="back">«</a></li>';
        console.log(pag);
        for (var k = 0; k <= pag; k++) {
            pgntr += '<li id="' + (k + 1) + '"><a href="#" onclick="mostrarPagina(\'' + (k + 1) + '\')">' + (k + 1) + '</a></li>';
        }
        pgntr += '<li id="nextentorn"><a id="next" rel="next">»</a></li>';
        console.log(pgntr);
        $paginacion.append(pgntr);
}

function mostrarPagina(pagina){
    $sintomas.children().remove();
    $sintomas.append(html[pagina-1]);
    $('ul.pagination').find('li.active').removeClass("active");
    $('#'+pagina).addClass('active');
    if(pagina == 1)
        $('#backentorn').addClass('disabled');
    else
        $('#backentorn').attr('class','enabled');
    if("nextentorn"  ==  $('ul.pagination').find('li.active').next().attr("id") )
        $('#nextentorn').addClass('disabled');
    else
        $('#nextentorn').attr('class','enabled');
}

function buscarSintoma(){
    var str = $(this).val();
    $sintomas.children().remove();
    if(str.length==0){
        $paginacion.children().remove();
        loadSintomasSource(full_data);
        mostrarPagina(1);
        return;
    }
    var temporal = [];
    for(var i=0;i<full_data.length;i++){
        var name = full_data[i].name;
        if(name.indexOf(str) > -1)
                temporal.push(full_data[i]);
    }
    $paginacion.children().remove();
    loadSintomasSource(temporal);
    mostrarPagina(1);
    incializarNextBack();
}

function asignar() {
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignados');
        full_data[_this.val()-1].noasignado = false;
    });
    values.length=0;
    //actualizamos
    $paginacion.children().remove();
    loadSintomasSource(full_data);
}
function devolver() {
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        _this.attr('name','origen');
        _this.parent().parent().appendTo('#noAsignados');
        full_data[_this.val()-1].noasignado = true;
    });
    values.length=0;
    $paginacion.children().remove();
    loadSintomasSource(full_data);
}

function showDescription(data){
    swal(data);
}