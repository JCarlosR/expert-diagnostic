$(document).on('ready',principal);

var factors= [];

function principal()
{
    // SÍNTOMAS
    $('#sintomaAdd').on('click',sintomaAdd);

    // ANTECEDENTES
    $('#antecedenteAdd').on('click',antecedenteAdd);

    // OTROS FACTORES
    $('#otroAdd').on('click',otroAdd);

    $('body').on('click','[data-takeout]',takeout);

    $('#newDiagnostic').on('click',newDiagnostic);
    $('#forwardChaining').on('click',forwardChaining);
}

function sintomaAdd()
{
    var sintoma = $('#sintoma').val();
    if( sintoma.length == 0){
        showmessage('Seleccione síntoma',1);
        return;
    }

    $.ajax({
        url: '../public/factores/'+sintoma,
        method: 'GET'
    }).done(function(data) {
        if( data.success == 'true' )
        {
            if( hasNotBeenAdded(data.data.id)  ){
                factors.push(data.data.id);
                var toAppend =
                    '<tr data-factorId="'+data.data.id+'">' +
                    '<td>'+data.data.name+'</td>'+
                    '<td><button data-takeout class="btn btn-danger">Quitar</button></td>'+
                    '</tr>';
                $('#factorList').append(toAppend);
            }
            else
                showmessage('El síntoma ya ha sido agregado a la lista.',1);
        }else
            showmessage(data.message,1);
    });
}

function antecedenteAdd()
{
    var antecedente = $('#antecedente').val();
    if( antecedente.length == 0){
        showmessage('Seleccione antecedente',1);
        return;
    }

    $.ajax({
        url: '../public/factores/'+antecedente,
        method: 'GET'
    }).done(function(data) {
        if( data.success == 'true' )
        {
            if( hasNotBeenAdded(data.data.id)  ){
                factors.push(data.data.id);
                var toAppend =
                    '<tr data-factorId="'+data.data.id+'">' +
                    '<td>'+data.data.name+'</td>'+
                    '<td><button data-takeout class="btn btn-danger">Quitar</button></td>'+
                    '</tr>';
                $('#factorList').append(toAppend);
            }
            else
                showmessage('El antecedente ya ha sido agregado a la lista.',1);
        }else
            showmessage(data.message,1);
    });
}

function otroAdd()
{
    var otro = $('#otro').val();
    if( otro.length == 0){
        showmessage('Seleccione factor',1);
        return;
    }

    $.ajax({
        url: '../public/factores/'+otro,
        method: 'GET'
    }).done(function(data) {
        if( data.success == 'true' )
        {
            if( hasNotBeenAdded(data.data.id)  ){
                factors.push(data.data.id);
                var toAppend =
                    '<tr data-factorId="'+data.data.id+'">' +
                    '<td>'+data.data.name+'</td>'+
                    '<td><button data-takeout class="btn btn-danger">Quitar</button></td>'+
                    '</tr>';
                $('#factorList').append(toAppend);
            }
            else
                showmessage('El factor ya ha sido agregado a la lista.',1);
        }else
            showmessage(data.message,1);
    });
}

function hasNotBeenAdded(factorId)
{
    for( var i=0;i<factors.length;i++)
        if( factors[i]== factorId )
            return false;
    return true;
}

function takeout()
{
    var factorId = $(this).parent().parent().attr('data-factorId');
    var tr = $(this).parent().parent();
    tr.remove();
    deleteElement(factors,factorId);
}

function deleteElement(  array, element ){
    var pos = 0;
    for( var i=0; i<array.length;i++ )
        if( array[i] == element )
            pos = i;

    array.splice(pos,1);
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

function newDiagnostic()
{
    location.reload();
}

function forwardChaining()
{
    if( factors.length == 0 ) {
        showmessage('Debe seleccionar por lo menos un factor.', 1);
        return;
    }
    var data = JSON.stringify(factors);

    $.ajax({
        url: '../public/diagnostico/forwardChaining',
        method: 'POST',
        data:{factors:data},
        dataType:'json',
        headers : {
            'X-CSRF-TOKEN' : $('#_token').val()
        }
    }).done(function(data) {
        if( data.success == 'true' )
        {
            $.each(data.data,function(key,value){
                showmessage(value.percentage+'%'+value.disease_name,0);
            })
        }else
            showmessage(data.message,1);
    });
}

