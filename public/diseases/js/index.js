$(document).on('ready', principal);

var $modalEditar;
var $modalWatch;
var $modalEliminar;

function principal()
{
    $('.mytable').footable();

    $modalEditar = $('#modalEditar');
    $modalEliminar = $('#modalEliminar');
    $modalWatch = $('#modalWatch');

    $('[data-edit]').on('click', mostrarEditar);
    $('[data-delete]').on('click', mostrarEliminar);
    $('[data-watch]').on('click', mostrarVideo);
    $('#form').on('submit', registerDisease);
}

function mostrarEditar() {
    var id = $(this).data('edit');
    $modalEditar.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEditar.find('[name="name"]').val(name);

    var description = $(this).data('description');
    $modalEditar.find('[name="description"]').val(description);

    var image = $(this).data('image');
    $modalEditar.find('[name="oldImage"]').val(image);
    var image_url = '../public/diseases/images/'+image;
    $("#oldImage").html('<img src="'+image_url+'" class="img-responsive image"> ');

    $modalEditar.modal('show');
}

function registerDisease()
{
    event.preventDefault();
    var url =  '../public/enfermedad/modificar';

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

function mostrarEliminar() {
    var id = $(this).data('delete');
    $modalEliminar.find('[name="id"]').val(id);

    var name = $(this).data('name');
    $modalEliminar.find('[name="nombreEliminar"]').val(name);

    $modalEliminar.modal('show');

    $('#accept').on('click', function(event)
    {
        event.preventDefault();
        var url =  '../public/enfermedad/eliminar/'+id;

        $.ajax({
                url: url,
                method: 'GET'
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

    });
}

function mostrarVideo()
{
    var video = $(this).data('video');
    $('#iframe').attr('src',video);

    $modalWatch.modal('show');
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
        timer: 300
    });
}