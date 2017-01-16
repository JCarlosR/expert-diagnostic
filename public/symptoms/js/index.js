$(document).on('ready', principal);

function principal()
{
    $modalNuevoS = $('#modalNuevoS');
    $modalEditarS = $('#modalEditarS');
    $modalEliminarS = $('#modalEliminarS');

    $modalNuevoA = $('#modalNuevoA');
    $modalEditarA = $('#modalEditarA');
    $modalEliminarA = $('#modalEliminarA');

    $modalNuevoF = $('#modalNuevoF');
    $modalEditarF = $('#modalEditarF');
    $modalEliminarF = $('#modalEliminarF');

    $('#btnNewS').on('click', mostrarNuevoS);
    $('[data-sintoma]').on('click', mostrarEditarS);
    $('[data-deletesintoma]').on('click', mostrarEliminarS);

    $('#btnNewA').on('click', mostrarNuevoA);
    $('[data-antecedente]').on('click', mostrarEditarA);
    $('[data-deleteantecedente]').on('click', mostrarEliminarA)

    $('#btnNewF').on('click', mostrarNuevoF);
    $('[data-factor]').on('click', mostrarEditarF);
    $('[data-deletefactor]').on('click', mostrarEliminarF)

    $('#formRegistrarS').on('submit', registerSymptom);
    $('#formEditarS').on('submit', updateSymptom);
    $('#formEliminarS').on('submit', deleteSymptom);

    $('#formRegistrarA').on('submit', registerAntecedente);
    $('#formEditarA').on('submit', updateAntecedente);
    $('#formEliminarA').on('submit', deleteAntecedente);

    $('#formRegistrarF').on('submit', registerFactor);
    $('#formEditarF').on('submit', updateFactor);
    $('#formEliminarF').on('submit', deleteFactor);
    
}

var $modalNuevoS;
var $modalEditarS;
var $modalEliminarS;

var $modalNuevoA;
var $modalEditarA;
var $modalEliminarA;

var $modalNuevoF;
var $modalEditarF;
var $modalEliminarF;

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

function registerAntecedente() {
    event.preventDefault();
    var url =  '../public/antecedente/registrar';
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
function updateAntecedente() {
    event.preventDefault();
    var url =  '../public/antecedente/modificar';
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
function deleteAntecedente() {
    event.preventDefault();
    var url =  '../public/antecedente/eliminar';
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
function updateFactor() {
    event.preventDefault();
    var url =  '../public/factor/modificar';
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
function deleteFactor() {
    event.preventDefault();
    var url =  '../public/factor/eliminar';
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
    var id = $(this).data('deletesintoma');
    $modalEliminarS.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminarS.find('[name="descEliminar"]').val(name);

    $modalEliminarS.modal('show');
}


function mostrarNuevoA() {
    $modalNuevoA.modal('show');
}
function mostrarEditarA() {

    var id = $(this).data('id');
    $modalEditarA.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEditarA.find('[name="name"]').val(name);

    var description = $(this).data('description');
    $modalEditarA.find('[name="description"]').val(description);

    var image = $(this).data('image');
    $modalEditarA.find('[name="newImage"]').val(image);
    var image_url = '../public/antecedente/images/'+image;
    $("#newImageA").html('<img src="'+image_url+'" class="img-responsive image"> ');
    $modalEditarA.modal('show');
}
function mostrarEliminarA() {
    var id = $(this).data('deleteantecedente');
    $modalEliminarA.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminarA.find('[name="descEliminar"]').val(name);

    $modalEliminarA.modal('show');
}


function mostrarNuevoF() {
    $modalNuevoF.modal('show');
}
function mostrarEditarF() {

    var id = $(this).data('id');
    $modalEditarF.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEditarF.find('[name="name"]').val(name);

    var description = $(this).data('description');
    $modalEditarF.find('[name="description"]').val(description);

    var image = $(this).data('image');
    $modalEditarF.find('[name="newImage"]').val(image);
    var image_url = '../public/factor/images/'+image;
    $("#newImageF").html('<img src="'+image_url+'" class="img-responsive image"> ');
    $modalEditarF.modal('show');
}
function mostrarEliminarF() {
    var id = $(this).data('deletefactor');
    $modalEliminarF.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminarF.find('[name="descEliminar"]').val(name);

    $modalEliminarF.modal('show');
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