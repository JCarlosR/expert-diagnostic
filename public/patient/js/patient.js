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

    var name = $(this).data('name');
    $modalEditar.find('[name="name"]').val(name);

    var description = $(this).data('surname');
    $modalEditar.find('[name="surname"]').val(description);

    var price = $(this).data('address');
    $modalEditar.find('[name="address"]').val(price);

    var brand = $(this).data('city');
    $modalEditar.find('[name="city"]').val(brand);

    var exemplar = $(this).data('country');
    $modalEditar.find('[name="country"]').val(exemplar);
    
    var image = $(this).data('image');
    $modalEditar.find('[name="newImage"]').val(image);
    var image_url = '../public/patient/images/'+image;
    $("#newImage").html('<img src="'+image_url+'" class="img-responsive image"> ');

    var comment = $(this).data('comment');
    $modalEditar.find('[name="comment"]').val(comment);

    var birthdate = $(this).data('birthdate');
    $modalEditar.find('[name="birthdate"]').val(birthdate);

    $modalEditar.modal('show');
}

function mostrarEliminar() {
    var id = $(this).data('delete');
    $modalEliminar.find('[name="id"]').val(id);

    var name = $(this).data('name');
    var surname = $(this).data('surname');
    $modalEliminar.find('[name="nombreEliminar"]').val(name+" "+surname);

    $modalEliminar.modal('show');
}

function mostrarNuevo() {
    $modalNuevo.modal('show');
}