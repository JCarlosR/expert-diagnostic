$(document).on('ready', principal);

var $modalEliminar;
var $modalAsignarMed;
var $modalWatch;

function principal() {
    $('.mytable').footable();

    $modalEliminar = $('#modalEliminar');
    $modalAsignarMed = $('#modalAsignarMed');
    $modalWatch = $('#modalWatch');

    $('[data-assign]').on('click', mostrarAsignar);
    $('[data-assignMed]').on('click', mostrarAsignarMed);
    $('[data-watch]').on('click', mostrarVideo);

    $('#symptom').on('click', addSymptom);
    $('#antecedent').on('click', addAntecedent);
    $('#other').on('click', addOther);
    $(document).on('click', '[data-delete]', removeFactor);
    $(document).on('click', '[data-eliminar]', showModalEliminar);
    $('#btn-new').on('click', reloadPage);
    $('#btn-save').on('click', saveRule);
    $('[data-rules]').on('click', showRules);
    $('#formEliminar').on('submit', removeRule);
    
}

var rules = [];

function showModalEliminar() {
    console.log("ENTRE");
    var id = $(this).data('eliminar');
    $modalEliminar.find('[name="id"]').val(id);

    var porcentaje = $(this).data('porcentaje');

    var name = $(this).data('name');
    $modalEliminar.find('[name="nombreEliminar"]').val(name + ' con un ' + porcentaje + ' %');

    var disease_id = $(this).data('enfermedad');
    $modalEliminar.find('[name="enfermedad"]').val(disease_id);

    $modalEliminar.modal('show');
}

function removeRule() {
    event.preventDefault();
    var url =  '../public/eliminar/regla';
    var datos = $(this).serializeArray();
    var _token = $(this).find('[name=_token]').val();

    console.log(datos);
    $.ajax({
        url: url,
        data: new FormData(this),
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

function showRules() {
    rules.length=0;
    var enfermedad = $(this).data('disease');
    $.getJSON('rules/enfermedad/'+enfermedad, function (data) {
        $('#table-rules').html("");
        for ( var i=0; i<data.length; ++i ) {

            rules.push({id: data[i].id, enfermedad: data[i].diseases.name, enfermedad_id: data[i].diseases.id, porcentaje:data[i].percentage });
            renderTemplateRules(data[i].id, data[i].diseases.name, data[i].diseases.id, data[i].percentage);
        }
        console.log(rules);
    });
}

var factors = [];

function saveRule() {
    var recomendaciones = recommendations();
    var enfermedad = $('#enfermedad').val();
    var peso = $('#peso').val();
    console.log('Factores');
    console.log(factors);
    console.log('Recomendaciones');
    console.log(recomendaciones);
    var data = [];
    data.push({name: 'factores', value: JSON.stringify(factors)});
    data.push({name: 'recomendaciones', value: JSON.stringify(recomendaciones)});
    data.push({name: 'enfermedad', value: JSON.stringify(enfermedad)});
    data.push({name: 'peso', value: JSON.stringify(peso)});
    var url = $(this).data('url');
    if (factors.length == 0 || recomendaciones.length == 0 || peso=='')
        showmessage('No hay factores o recomendaciones seleccionados o el porcentaje esta vacío',1);
    $.ajax({
        url: url,
        data: data,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
        .done(function( response ) {
            if (response.error) {
                showmessage(response.message,1);
            } else {
                showmessage(response.message,0);
                
            }
        });
}

function addSymptom() {
    var sintoma = $('#sintoma').val();
    $.getJSON('../../factor/nombre/'+sintoma, function (data) {
        console.log(data);
        if (factors.length == 0) {
            factors.push({nombre: data.name, id: data.id});
            renderTemplateFactors(data.name, data.id);
        }else{
            if (dontRepeat(data.id)){
                factors.push({nombre: data.name, id: data.id});
                renderTemplateFactors(data.name, data.id);
            }else{
                showmessage('Ya a ingresado este sintoma como factor',1);
            }
        }

    });
    console.log(factors);
}

function addAntecedent() {
    var antecedente = $('#antecedente').val();
    $.getJSON('../../factor/nombre/'+antecedente, function (data) {
        console.log(data);
        if (factors.length == 0) {
            factors.push({nombre: data.name, id: data.id});
            renderTemplateFactors(data.name, data.id);
        }else{
            if (dontRepeat(data.id)){
                factors.push({nombre: data.name, id: data.id});
                renderTemplateFactors(data.name, data.id);
            }else{
                showmessage('Ya a ingresado este antecedente como factor',1);
            }
        }

    });
    console.log(factors);
}

function addOther() {
    var otro = $('#otro').val();
    $.getJSON('../../factor/nombre/'+otro, function (data) {
        console.log(data);
        if (factors.length == 0) {
            factors.push({nombre: data.name, id: data.id});
            renderTemplateFactors(data.name, data.id);
        }else{
            if (dontRepeat(data.id)){
                factors.push({nombre: data.name, id: data.id});
                renderTemplateFactors(data.name, data.id);
            }else{
                showmessage('Ya a ingresado este antecedente como factor',1);
            }
        }

    });
    console.log(factors);
}

function removeFactor() {
    console.log('ENTER');
    var $tr = $(this).parents('tr');
    var id = $(this).data('delete');
    factorDelete(id);
    $tr.remove();
}

function factorDelete(id) {
    for (var i = 0; i<factors.length; ++i) {
        if (factors[i].id == id) {
            factors.splice(i, 1);
            return;
        }
    }
}

function dontRepeat(factor) {
    for (var i = 0; i<factors.length; ++i){
        if ( factors[i].id == factor )
            return false;
    }
    return true;
}

function reloadPage() {
    location.reload();
}

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}

function renderTemplateFactors(name, id) {
    var clone = activateTemplate('#template-factor');

    clone.querySelector("[data-factor]").innerHTML = name;
    clone.querySelector("[data-delete]").setAttribute('data-delete', id);

    $('#table-factors').append(clone);
}

function renderTemplateRules(rule_id, disease_name, disease_id, porcentaje) {

    var clone = activateTemplate('#template-rule');

    clone.querySelector("[data-rule]").innerHTML = disease_name;
    clone.querySelector("[data-percentage]").innerHTML = porcentaje+' %';
    clone.querySelector("[data-factors]").setAttribute('data-factors', rule_id);
    clone.querySelector("[data-recommendation]").setAttribute('data-recommendation', rule_id);
    clone.querySelector("[data-eliminar]").setAttribute('data-eliminar', rule_id);
    clone.querySelector("[data-eliminar]").setAttribute('data-name', disease_name);
    clone.querySelector("[data-eliminar]").setAttribute('data-enfermedad', disease_id);
    clone.querySelector("[data-eliminar]").setAttribute('data-porcentaje', porcentaje);

    $('#table-rules').append(clone);
}

var asignados;
var no_asignados;
var asignadosMed;
var no_asignadosMed;
var values = [];
var origen = [];
var destino= [];
var valuesMed = [];
var origenMed = [];
var destinoMed= [];

function mostrarAsignarMed() {
    $asignadosMed = $('#asignadosMed');
    $noAsignadosMed = $('#noAsignadosMed');
    var enfermedad = $(this).data('assignmed');
    document.getElementById('diseaseMed').innerHTML = $(this).data('name');
    var enfer = document.getElementById("enfermedadMed");

    enfer.setAttribute( 'data-diseasemed', enfermedad );
    console.log(enfermedad);
    var url = $(this).data('url');
    var route = url+'/'+enfermedad;
    console.log(route);
    $.getJSON(route, function (data) {
        asignadosMed = data.asignados;
        no_asignadosMed = data.no_asignados;
        console.log(asignadosMed);
        console.log(no_asignadosMed);
        loadMedicamentosAsignados(asignadosMed);
        loadMedicamentosNoAsignados(no_asignadosMed);
    });
    $modalAsignarMed.modal('show');

}

function mostrarAsignar() {
    $asignados = $('#asignados');
    $noAsignados = $('#noAsignados');
    var enfermedad = $(this).data('assign');
    document.getElementById('disease').innerHTML = $(this).data('name');
    var enfer = document.getElementById("enfermedad");

    enfer.setAttribute( 'data-disease', enfermedad );

    var url = $(this).data('url');
    var route = url+'/'+enfermedad;
    console.log(route);
    $.getJSON(route, function (data) {
        asignados = data.asignados;
        no_asignados = data.no_asignados;
        console.log(asignados);
        console.log(no_asignados);
        loadSintomasAsignados(asignados);
        loadSintomasNoAsignados(no_asignados);
    });
    $modalAsignar.modal('show');

}

function loadMedicamentosAsignados(data){
    $asignadosMed.empty();
    for (var i=0; i<data.length; ++i) {
        console.log(data[i].medication_id);

        var html = '<div data-detalle="'+data[i].medication_id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./medication/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="destino" value="'+data[i].medication_id+'"/>'+data[i].trade_name+'</label></div>';
        $asignadosMed.append(html);
    }
}

function loadMedicamentosNoAsignados(data){
    console.log(data);
    $noAsignadosMed.empty();
    for (var i=0; i<data.length; ++i) {
        var html = '<div data-detalle="'+data[i].id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./medication/images/'+data[i].image+'" style="height: 100px" onclick="showDescription(\''+data[i].description+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].trade_name+'</label></div>';
        $noAsignadosMed.append(html);
    }
}

function loadSintomasAsignados(data){
    $asignados.empty();
    for (var i=0; i<data.length; ++i) {
        console.log(data[i].symptom_id);

        var html = '<div class="col-md-6" data-detalle="'+data[i].symptom_id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="destino" value="'+data[i].symptom_id+'"/>'+data[i].name+'</label></div>';
        $asignados.append(html);
    }
}

function loadSintomasNoAsignados(data){
    console.log(data);
    $noAsignados.empty();
    for (var i=0; i<data.length; ++i) {
        var html = '<div data-detalle="'+data[i].id+'" class="sintoma col-md-6 text-center"><img  class="img-thumbnail img-rounded" src="./symptoms/images/'+data[i].imagen+'" style="height: 100px" onclick="showDescription(\''+data[i].descripcion+'\')"/><label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="origen" value="'+data[i].id+'"/>'+data[i].name+'</label></div>';
        $noAsignados.append(html);
    }
}

function asignarMed() {
    // Id enfermedad
    var enfermedad = $('#enfermedadMed').data('diseasemed');
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);

        // Id del sintoma
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        // Llamado ajax para guardar el nuevo sintoma
        var url =  '../public/asignar/medicamento/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

                /*                if(response.error)
                 showmessage(response.message,1);
                 else{
                 showmessage(response.message,0);
                 setTimeout(function(){
                 location.reload();
                 }, 3000);
                 }*/
            });
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignadosMed');
        location.reload();

    });

    values.length=0;

}

function devolverMed() {
    var enfermedad = $('#enfermedadMed').data('diseasemed');
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        var url =  '../public/desasignar/medicamento/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

                /*                if(response.error)
                 showmessage(response.message,1);
                 else{
                 showmessage(response.message,0);
                 setTimeout(function(){
                 location.reload();
                 }, 3000);
                 }*/
            });
        _this.attr('name','origen');
        _this.parent().parent().appendTo('#noAsignadosMed');
        location.reload();

    });
    values.length=0;
}

function asignar() {
    // Id enfermedad
    var enfermedad = $('#enfermedad').data('disease');
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);

        // Id del sintoma
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        // Llamado ajax para guardar el nuevo sintoma
        var url =  '../public/asignar/sintoma/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

/*                if(response.error)
                    showmessage(response.message,1);
                else{
                    showmessage(response.message,0);
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }*/
            });
        _this.attr('name','destino');
        _this.parent().parent().appendTo('#asignados');
        location.reload();

    });

    values.length=0;

}
function devolver() {
    var enfermedad = $('#enfermedad').data('disease');
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        console.log('Id de la enfermedad')
        console.log(enfermedad);
        console.log('Id del sintoma')
        console.log(_this.val());
        var url =  '../public/desasignar/sintoma/'+enfermedad+'/'+_this.val();
        $.ajax({
            url: url,
            method: 'GET'
        })
            .done(function( response ) {

                /*                if(response.error)
                 showmessage(response.message,1);
                 else{
                 showmessage(response.message,0);
                 setTimeout(function(){
                 location.reload();
                 }, 3000);
                 }*/
            });
        _this.attr('name','origen');
        _this.parent().parent().appendTo('#noAsignados');
        location.reload();

    });
    values.length=0;
}

function mostrarVideo() {
    var video = $(this).data('video');
    $('#iframe').attr('src',video);

    $modalWatch.modal('show');

    $('#exit').on('click', function() {
        location.reload();
    });
}

function showmessage( message, error ) {
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
        timer: 400
    });
}

function showDescription(data){
    swal(data);
}