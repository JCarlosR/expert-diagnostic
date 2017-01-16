$(document).on('ready', principal);

function principal()
{
    $modalNuevoS = $('#modalNuevoS');
    $modalEditarS = $('#modalEditarS');
    $modalEliminarS = $('#modalEliminarS');

    $modalNuevoA = $('#modalNuevoA');

    $('#btnNewS').on('click', mostrarNuevoS);
    $('[data-sintoma]').on('click', mostrarEditarS);
    $('[data-deletesintoma]').on('click', mostrarEliminarS);

    $('#btnNewA').on('click', mostrarNuevoA);
/*    $('[data-antecedente]').on('click', mostrarEditarA);
    $('[data-deleteantecedente]').on('click', mostrarEliminarA);

    $('[data-factor]').on('click', mostrarEditarF);
    $('[data-deletefactor]').on('click', mostrarEliminarF);*/

    $('#formRegistrarS').on('submit', registerSymptom);
    $('#formEditarS').on('submit', updateSymptom);
    $('#formEliminarS').on('submit', deleteSymptom);

    $('#formRegistrarA').on('submit', registerFactor);

/*    $('#btnNewA').on('click', mostrarNuevoA);
    $('#btnNewF').on('click', mostrarNuevoF);*/
}

var $modalNuevoS;
var $modalEditarS;
var $modalEliminarS;

var $modalNuevoA;
var $modalEditarA;
var $modalEliminarA;

function deleteSymptom() {
    event.preventDefault();
    var url =  '../public/symptom/eliminar';
    $.ajax({
        url: url,
        data: new FormData(this),
        dataType: "JSON",
        processData: false,
        contentType: false,
        method: 'POST'
    })
        .done(function( response ) {

            if(response.error)
                showmessage(response.message,1);
            else{
                showmessage(response.message,0);
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
        });
}

function updateSymptom() {
    event.preventDefault();
    var url =  '../public/symptom/modificar';
    $.ajax({
        url: url,
        data: new FormData(this),
        dataType: "JSON",
        processData: false,
        contentType: false,
        method: 'POST'
    })
        .done(function( response ) {

            if(response.error)
                showmessage(response.message,1);
            else{
                showmessage(response.message,0);
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
        });
}

function registerSymptom() {
    event.preventDefault();
    var url =  '../public/symptom/registrar';
    $.ajax({
        url: url,
        data: new FormData(this),
        dataType: "JSON",
        processData: false,
        contentType: false,
        method: 'POST'
    })
        .done(function( response ) {

            if(response.error)
                showmessage(response.message,1);
            else{
                showmessage(response.message,0);
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
}

function registerFactor() {
    event.preventDefault();
    var url =  '../public/factor/registrar';
    $.ajax({
        url: url,
        data: new FormData(this),
        dataType: "JSON",
        processData: false,
        contentType: false,
        method: 'POST'
    })
        .done(function( response ) {

            if(response.error)
                showmessage(response.message,1);
            else{
                showmessage(response.message,0);
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
}


function mostrarNuevoS() {
    $modalNuevoS.modal('show');
}

function mostrarEditarS() {

    var id = $(this).data('id');
    $modalEditarS.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEditarS.find('[name="name"]').val(name);

    var description = $(this).data('description');
    $modalEditarS.find('[name="description"]').val(description);

    var image = $(this).data('image');
    $modalEditarS.find('[name="newImage"]').val(image);
    var image_url = '../public/symptoms/images/'+image;
    $("#newImage").html('<img src="'+image_url+'" class="img-responsive image"> ');
    $modalEditarS.modal('show');
}

function mostrarEliminarS() {
    var id = $(this).data('delete');
    $modalEliminarS.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminarS.find('[name="descEliminar"]').val(name);

    $modalEliminarS.modal('show');
}


function mostrarNuevoA() {
    $modalNuevoA.modal('show');
}

function showmessage( message, error ){
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
        timer: 300
    });
}