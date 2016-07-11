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
var values = [];
var origen = [];
var destino= [];

function mostrarAsignar() {
    $asignados = $('#asignados');
    $noAsignados = $('#noAsignados');
    var enfermedad = $(this).data('assign');
    document.getElementById('disease').innerHTML = $(this).data('name');
    var enfer = document.getElementById("enfermedad");

    enfer.setAttribute( 'data-disease', enfermedad );

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
        console.log(data[i].symptom_id);

        var html = '<div class="col-md-6" data-detalle="'+data[i].symptom_id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="destino" value="'+data[i].symptom_id+'"/>'+data[i].name+'</label></div>';
        $asignados.append(html);
    }
}

function loadSintomasNoAsignados(data){
    console.log(data);
    $noAsignados.empty();
    for (var i=0; i<data.length; ++i) {
        var html = '<div data-detalle="'+data[i].id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].name+'</label></div>';
        $noAsignados.append(html);
    }
}

function asignar() {
    // Id enfermedad
    var enfermedad = $('#enfermedad').data('disease');
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);

        // Id del sintoma
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        // Llamado ajax para guardar el nuevo sintoma
        var url =  '../public/asignar/sintoma/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

/*                if(response.error)
                    showmessage(response.message,1);
                else{
                    showmessage(response.message,0);
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }*/
            });
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignados');
        location.reload();

    });

    values.length=0;

}
function devolver() {
    var enfermedad = $('#enfermedad').data('disease');
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        var url =  '../public/desasignar/sintoma/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

                /*                if(response.error)
                 showmessage(response.message,1);
                 else{
                 showmessage(response.message,0);
                 setTimeout(function(){
                 location.reload();
                 }, 3000);
                 }*/
            });
        _this.attr('name','origen');
        _this.parent().parent().appendTo('#noAsignados');
        location.reload();

    });
    values.length=0;
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