var $modalEditar;
var $formEditar;
var _token;

$(document).on('ready', function() {
    // Referencias a usar
    $modalEditar = $('#modalEditar');
    $formEditar = $('#formEditar');
    _token = $('[name="_token"]').val();

    // Evento de envío de formularios (registro)
    $('form').on('submit', registrarSkill);

    // Evento para mostrar el modal de edición
    $(document).on('click', '[data-editar]', mostrarModal);

    // Evento para guardar los cambios de edición
    $formEditar.on('submit', guardarCambios);

    // Evento para eliminar un skill
    $(document).on('click', '[data-eliminar]', eliminarSkill);
});

function registrarSkill() {
    event.preventDefault();

    $form = $(this);

    $.ajax({
        url: 'registrar/symptom',
        type: 'POST',
        data: $form.serialize(),
        success: function (data) {
            agregarFila($form.prev('table'), data.id, data.descripcion);
        },
        error: function (data) {
            var errors = data.responseJSON;

            $.each(errors, function (i, value) {
                renderTemplateAlerta($form, value);
            });
        }
    });
}

var $filaEditar;

function mostrarModal() {
    // Cargar los datos al modal
    $filaEditar = $(this).parents('tr');
    var id = $(this).data('editar');

    var nombre = $filaEditar.find('[data-name]').text();
    var descripcion = $filaEditar.find('[data-description]').text();

    $formEditar.find('[name="id"]').val(id);
    $formEditar.find('[name="description"]').val(descripcion);

    // Mostrar el modal
    $modalEditar.modal('show');
}

function guardarCambios() {
    event.preventDefault();

    $.ajax({
        url: 'modificar/symptom',
        type: 'POST',
        data: $form.serialize(),
        success: function (data) {
            editarFila(data.description);
            $modalEditar.modal('hide');
        },
        error: function (data) {
            var errors = data.responseJSON;

            $.each(errors, function (i, value) {
                renderTemplateAlerta($modalEditar.find('.modal-body'), value);
            });
        }
    });
}

function eliminarSkill() {
    var id = $(this).prev().data('editar');
    var $filaEliminar = $(this).parents('tr');
    var $tbody = $filaEliminar.parents('tbody');

    $.ajax({
        url: 'eliminar/symptom',
        type: 'POST',
        data: { id: id, _token: _token },
        success: function (data) {
            $filaEliminar.fadeOut('slow', function() {
                $(this).remove();
                actualizarEnumeracion($tbody);
            });
        },
        error: function (data) {
            var errors = data.responseJSON;

            $.each(errors, function (i, value) {
                renderTemplateAlerta($filaEliminar.parents('.panel-body'), value);
            });
        }
    });
}

// En adelante, funciones de ayuda

function activateTemplate(id) {
    var t = document.querySelector(id);
    return $(document.importNode(t.content, true));
}

function renderTemplateAlerta($target, mensaje) {
    var $alerta = activateTemplate('#template-alerta');
    $alerta.find('span').text(mensaje);
    $target.prepend($alerta);
}

function agregarFila($table, id, descripcion) {
    var $fila = activateTemplate('#template-fila');
    $fila.find('[data-description]').text(descripcion);
    $fila.find('[data-editar]').data('editar', id);
    var $tbody = $table.find('tbody');
    $tbody.append($fila);

    actualizarEnumeracion($tbody);
}

function editarFila(nombre, descripcion) {
    $filaEditar.find('[data-name]').text(nombre);
    $filaEditar.find('[data-description]').text(descripcion);
}

function actualizarEnumeracion($tbody) {
    var i = 0;
    $tbody.find('tr').each(function() {
        $(this).find('[data-i]').text(++i);
    });
}