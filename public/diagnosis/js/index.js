$(document).on('ready', principal);

var disease_simptom = [];

function principal(){
    $sintomas = $('#noAsignados');
    $buscador = $('#search');

    $buscador.on('input',buscarSintoma);

    $.getJSON('diagnostico/all', function (data) {
        full_data = data;
        console.log(data);
        loadSintomasSource(full_data);
    });
}

var full_data;
var values = [];
var origen = [];
var destino= [];

function loadSintomasSource(data){
    for (var i=0; i<data.length; ++i) {
    var html = '<div data-detalle="'+data[i].id+'" class="sintoma col-md-4 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].name+'</label></div>';
    $sintomas.append(html);
    }
}

function buscarSintoma(){
    var str = $(this).val();
    $sintomas.children().remove();
    if(str.length==0){
        loadSintomasSource(full_data);
        return;
    }
    var temporal = [];
    for(var i=0;i<full_data.length;i++){
        var name = full_data[i].name;
        if(name.indexOf(str) > -1){
            temporal.push(full_data[i]);
        }
    }
    loadSintomasSource(temporal);
}

function asignar() {
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
        disease_simptom.push($(this).val());
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignados');

    });
    values.length=0;

    $.ajax({
        url: 'diagnostico/enfermedades/'+disease_simptom,
        method: 'GET'
    }).done(function (data) {

        alert('I am here again');
    });
}

function devolver() {
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });

    $(values).each( function(i,element) {
        var _this = $(this);
        _this.attr('name','origen');
        _this.parent().parent().appendTo('#noAsignados');

    });
    values.length=0;
}

function showDescription(data){
    swal(data);
}