$(document).on('ready', principal);

var disease_simptom = [];

function principal(){
    $sintomas = $('#noAsignados');
    $buscador = $('#search');
    $buscador.on('input',buscarSintoma);

    //SoleS
    $modalDetalles    = $('#modalDetalles');
    $modalTratamiento = $('#modalTratamiento');

    $('[data-detail]').on('click', mostrarDetalles);
    $('[data-id]').on('click', mostrarTratamiento);

    $.getJSON('diagnostico/all', function (data) {
        full_data = data;
        loadSintomasSource(full_data);
    });
}

var full_data;
var values = [];
var origen = [];
var destino= [];

//SoleS
var $modalDetalles;
var $modalTratamiento;

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
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignados');

    });
    values.length=0;

    //SoleS Logic
    show_diseases();

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
    //SoleS Logic
    show_diseases();
}

function showDescription(data){
    swal(data);
}

function show_diseases()
{
    var asignados = document.getElementById("asignados").children;
    var len = asignados.length;
    var symptoms = [];

    for(  var i =0;i<len; i++ )
        symptoms.push( asignados[i].getAttribute('data-detalle') );

    $.ajax({
        url: '../public/diagnostico/enfermedades',
        data: {symptoms: JSON.stringify(symptoms)},
        method: 'GET'
    }).done(function (data) {
        if(  data.error ){
            $('#enfermedades').html('');
            alert(data.message);
        }
        else
        {
            $('#enfermedades').html('');

            //<img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px"/>
            var id = []; var name = []; var image = []; var video = []; var description = [];

            $.each(data.id,function(key,value) { id.push(value); });
            $.each(data.name,function(key,value) { name.push(value); });
            $.each(data.image,function(key,value) { image.push(value); });
            $.each(data.video,function(key,value) { video.push(value); });
            $.each(data.description,function(key,value) { description.push(value); });

            for( var i=0; i<id.length;i++ )
            {
                var html_ =
                    '<div class="col-md-6">'+
                        '<div class="card text-center" style="background-color: #4e4e4e; border-color: #151515; color:white;">'+
                            '<div class="card-block" id="datas">'+
                                '<h3 class="card-title">'+ name[i] +'</h3>'+
                                '<button type="button" class="btn btn-success" onclick="mostrarDetalles();" data-description="'+ description[i] +'" data-image="'+ image[i] +'">'+
                                    '<i class="fa fa-eye"></i> Ver enfermedad'+
                                '</button>'+
                                '<button type="button" class="btn btn-success" data-id="'+ id[i] +'" data-video="'+ video[i] +'">'+
                                    '<i class="fa fa-eye"></i> Ver tratamiento'+
                                '</button>'+
                                '<br><br>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                $('#enfermedades').append(html_);
            }
        }

        //onclick="mostrarDetalles();"
    });
}

function mostrarDetalles()
{
    event.preventDefault();


    //  var id = $(this).data('edit');
  // $modalEditar.find('[name="id"]').val(id);

}

function mostrarTratamiento()
{
    alert('go');
}