$(document).on('ready', principal);

var $modalAsignar;
var $modalWatch;

function principal() {
    $('.mytable').footable();

    $modalAsignar = $('#modalAsignar');
    $modalWatch = $('#modalWatch');

    $('[data-assign]').on('click', mostrarAsignar);
    $('[data-watch]').on('click', mostrarVideo);
}

var asignados;
var no_asignados;

function mostrarAsignar() {
    $asignados = $('#asignados');
    $noAsignados = $('#noAsignados');
    var enfermedad = $(this).data('assign');
    var url = $(this).data('url');
    var route = url+'/'+enfermedad;
    console.log(route);
    $.getJSON(route, function (data) {
        asignados = data.asignados;
        no_asignados = data.no_asignados;
        console.log(asignados);
        console.log(no_asignados);
        loadSintomasAsignados(asignados);
        loadSintomasNoAsignados(no_asignados);
    });
    $modalAsignar.modal('show');

}

function loadSintomasAsignados(data){
    $asignados.empty();
    for (var i=0; i<data.length; ++i) {
        var html = '<div class="col-md-6" data-detalle="'+data[i].id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].name+'</label></div>';
        $asignados.append(html);
    }
}

function loadSintomasNoAsignados(data){
    $noAsignados.empty();
    for (var i=0; i<data.length; ++i) {
        var html = '<div data-detalle="'+data[i].id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].name+'</label></div>';
        $noAsignados.append(html);
    }
}

function mostrarVideo() {
    var video = $(this).data('video');
    $('#iframe').attr('src',video);

    $modalWatch.modal('show');

    $('#exit').on('click', function() {
        location.reload();
    });
}

function showmessage( message, error ) {
    var icon = 'ti-thumb-up';
    var type = 'success';
    if( error==1 )
    {
        icon = 'ti-thumb-down';
        type = 'danger';
    }

    $.notify({
        icon: icon,
        message: '<b>'+message+'</b>'

    },{
        type: type,
        timer: 400
    });
}

function showDescription(data){
    swal(data);
}