$(document).on('ready', principal);

var $modalNuevo;
var $modalEditar;
var $modalEliminar;

function principal()
{
    $('.mytable').footable();

    $modalNuevo = $('#modalNuevo');
    $modalEditar = $('#modalEditar');
    $modalEliminar = $('#modalEliminar');

    $('[data-id]').on('click', mostrarEditar);
    $('[data-delete]').on('click', mostrarEliminar);

    $('#formEditar').on('submit', updateMedication);
    $('#formRegistrar').on('submit', registerMedication);
    $('#formEliminar').on('submit', deleteMedication);
    $('#btnNew').on('click', mostrarNuevo);
}

function deleteMedication() {
    event.preventDefault();
    var url =  '../public/medicamentos/eliminar';
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
                }, 500);
            }
        });
}

function updateMedication() {
    event.preventDefault();
    var url =  '../public/medicamentos/modificar';
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
                }, 500);
            }
        });
}

function registerMedication() {
    event.preventDefault();
    var url =  '../public/medicamentos/registrar';
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
                }, 500);
            }
        });
}

function mostrarEditar() {

    $modalEditar = $('#modalEditar');
    var id = $(this).data('id');
    $modalEditar.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEditar.find('[name="name"]').val(name);

    var description = $(this).data('description');
    $modalEditar.find('[name="description"]').val(description);

    $modalEditar.modal('show');
}

function mostrarEliminar() {
    var id = $(this).data('delete');
    $modalEliminar.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminar.find('[name="nombreEliminar"]').val(name);

    $modalEliminar.modal('show');
}

function mostrarNuevo() {
    $modalNuevo.modal('show');
}

function showmessage( message, error )
{
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
        timer: 500
    });
}