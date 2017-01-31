$(document).on('ready',principal);

var factors= [];
var ids = [];
var names = [];
var globalFactorsIds = [];
var globalFactorsNames = [];
var globalFactorsDescriptions = [];
var $modalRecommendation;
function principal()
{

    $.getJSON('./enfermedades/factores', function (data) {
        $.each(data,function(key,value)
        {
            globalFactorsIds.push(value.id);
            globalFactorsNames.push(value.name);
            globalFactorsDescriptions.push(value.descripcion);
        });
    });

    // SÍNTOMAS
    $('#sintomaAdd').on('click',sintomaAdd);

    // ANTECEDENTES
    $('#antecedenteAdd').on('click',antecedenteAdd);

    // OTROS FACTORES
    $('#otroAdd').on('click',otroAdd);

    $('body').on('click','[data-takeout]',takeout);

    $('#newDiagnostic').on('click',newDiagnostic);
    $('#forwardChaining').on('click',forwardChaining);

    $modalRecommendation = $('#modalRecommendation');
    $('body').on('click','[data-recommendation]',modalRecommendation);
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

    var timer = $('#forwardChaining').attr('data-timer');
    var data = JSON.stringify(factors);

    $.ajax({
        url: '../public/diagnostico/forwardChaining',
        method: 'POST',
        data:{factors:data,timer:timer},
        dataType:'json',
        headers : {
            'X-CSRF-TOKEN' : $('#_token').val()
        }
    }).done(function(data) {
        if( data.success == 'true' )
        {
          ids   = [];
          names = [];
            $.each(data.data,function(key,value){
                // Possible diseases
                ids.push(value.id);
                names.push(value.percentage+'%'+value.disease_name);

                diagnose();
            })

        }else
            showmessage(data.message,1);
    });
}

// LOGIC EXPERT-DIAGNOSTIC

// Associative array length
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function diagnose() {
    var diseaseFactors = [];
    for (var i=0; i<ids.length; ++i) {
        var disease_id = ids[i];
        $.getJSON('./enfermedades/factores/'+disease_id, function (data) {
            var arreglo = [];
            $.each(data.factorIds,function(key,value)
            {
                arreglo.push(value.factor_id);
            });

            diseaseFactors[data.rule_id] = arreglo;
            // When all the factors were loaded
            if (Object.size(diseaseFactors) == ids.length) {
                startDiagnoseQuestions(diseaseFactors);
            }
        });
    }
}

function startDiagnoseQuestions(diseaseFactors) {
    $('#answer').html('');
    diagnoseDisease(0, diseaseFactors);
}

function diagnoseDisease(diagnose_position, diseaseFactors) {
    if (diagnose_position == ids.length) {
        // CUANDO NO DETECTA NADA
        var timer = $('#forwardChaining').attr('data-timer');

        $.ajax({
            url: '../public/diagnostico/timer',
            method: 'POST',
            data:{timer:timer},
            dataType:'json',
            headers : {
                'X-CSRF-TOKEN' : $('#_token').val()
            }
        }).done(function() { });
        return;
    }

    var disease_id = ids[diagnose_position];
    var name = names[diagnose_position];
    var symptoms = diseaseFactors[disease_id];

    swal.setDefaults({
        confirmButtonText: 'Sí, lo padezco',
        cancelButtonText: 'No',
        showCancelButton: true,
        animation: false
    });

    var steps = [];
    for (var i=0; i<symptoms.length; ++i) {
        if (notSelectedSymptom(symptoms[i])) {
            steps.push({
                title: 'Usted presenta este factor?',
                text: factorName(symptoms[i])
            });
        }
    }

    swal.queue(steps).then(function () {
        swal({
            title: 'Usted presenta: '+name,
            confirmButtonText: 'Entendido !',
            showCancelButton: false
        }).finally(function() {
            swal.resetDefaults();
            var timer = $('#forwardChaining').attr('data-timer');

            $.ajax({
                url: '../public/diagnostico/timer',
                method: 'POST',
                data:{timer:timer},
                dataType:'json',
                headers : {
                    'X-CSRF-TOKEN' : $('#_token').val()
                }
            }).done(function() {
                $('#answer').append('<button class="btn btn-success" data-recommendation_name="'+name+'"  data-recommendation="'+disease_id+'">'+name+'</button>');
            });
            return;
            //diagnoseDisease(diagnose_position+1, diseaseFactors);
        });
    }, function () {
        swal({
            title: 'Se ha descartado la enfermedad: '+name,
            confirmButtonText: 'Entendido !',
            showCancelButton: false
        }).finally(function() {
            swal.resetDefaults();
            diagnoseDisease(diagnose_position+1, diseaseFactors);
        });
    })
}

function factorName(factorId) {
    for (var i=0; i<globalFactorsIds.length; ++i) {
        if (globalFactorsIds[i] == factorId)
            return globalFactorsNames[i].bold()+'\n ('+globalFactorsDescriptions[i]+' )';
    }
}

function notSelectedSymptom(symptom_id) {
    for (var i=0; i<factors.length; ++i)
        if (factors[i] == symptom_id)
            return false;
    return true;
}

function modalRecommendation()
{
    var recommendation = $(this).data('recommendation');
    var recommendation_name = $(this).data('recommendation_name');
    $('#name_recommendation').val(recommendation_name);
    $('#recommendations').html('');

    $.getJSON('./enfermedades/recomendaciones/'+recommendation, function (data) {
        $.each(data,function(key,value)
        {
            $('#recommendations').append('<i class="fa fa-check"></i> '+value.description+'<br>');
        });
    });

    $modalRecommendation.modal('show');
}