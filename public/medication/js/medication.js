$(document).on('ready', principal);

function principal()
{
    $('.mytable').footable();

    $modalNuevo = $('#modalNuevo');
    $modalEditar = $('#modalEditar');
    $modalEliminar = $('#modalEliminar');

    $('[data-id]').on('click', mostrarEditar);
    $('[data-delete]').on('click', mostrarEliminar);

    $('#btnNew').on('click', mostrarNuevo);
}

function mostrarEditar() {

    $modalEditar = $('#modalEditar');
    var id = $(this).data('id');
    $modalEditar.find('[name="id"]').val(id);

    var name = $(this).data('trade_name');
    $modalEditar.find('[name="name"]').val(name);

    var component = $(this).data('active_component');
    $modalEditar.find('[name="component"]').val(component);

    var description = $(this).data('description');
    $modalEditar.find('[name="description"]').val(description);

    var image = $(this).data('image');
    $modalEditar.find('[name="newImage"]').val(image);
    var image_url = '../public/medication/images/'+image;
    $("#newImage").html('<img src="'+image_url+'" class="img-responsive image"> ');

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