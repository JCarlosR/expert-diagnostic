$(document).on('ready',principal);

var $modalRecomendation;
var added= [];

function principal(){
    $modalRecomendation = $('#modalRecomendation');
    $('#addRecomendations').on('click',modalRecomendation);
    $('#addRecomendationTable').on('click',addRecomendationTable);
    $('body').on('click','[data-takeout]',takeout);
    $.ajax({
        url: '../../../public/recomendaciones/nombres',
        method: 'GET'
    }).done(function(data) {
        loadAutoCompleteLocations(data);
    });
}

function loadAutoCompleteLocations(data){
    $('#recomendations').typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'recomendations',
            source: substringMatcher(data)
        }
    );
}

function modalRecomendation(){
    $modalRecomendation.modal('show');
}

function addRecomendationTable(){
    var recomendation = $('#recomendations').val();
    if( recomendation.length == 0)    {
        showmessage('Seleccione recomendación',1);
        return;
    }

    $.ajax({
        url: '../../../public/recomendaciones/'+recomendation,
        method: 'GET'
    }).done(function(data) {
        if( data.success == 'true' )
        {
            if( hasNotBeenAdded(data.data.id)  ){
                added.push(data.data.id);
                var toAppend =
                    '<tr data-recommendation="'+data.data.id+'">' +
                    '<td>'+data.data.name+'</td>'+
                    '<td><button data-takeout class="btn btn-danger">Quitar</button></td>'+
                    '</tr>';
                $('#recomendationData').append(toAppend);
            }
            else
                showmessage('La recomendación ya ha sido agregada a la lista.',1);
        }else
            showmessage(data.message,1);
    });
}

function hasNotBeenAdded(recomendationId){
    for( var i=0;i<added.length;i++)
        if( added[i]== recomendationId )
            return false;
    return true;
}

function takeout(){
    var recommendationId = $(this).parent().parent().attr('data-recommendation');
    var tr = $(this).parent().parent();
        tr.remove();
    deleteElement(added,recommendationId);
}

function deleteElement(  array, element ){
    var pos = 0;
    for( var i=0; i<array.length;i++ )
        if( array[i] == element )
            pos = i;

    array.splice(pos,1);
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
        timer: 500
    });
}

function recommendations()
{
    return added;
}
