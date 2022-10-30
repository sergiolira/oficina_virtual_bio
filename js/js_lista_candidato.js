//mostrar listaa
function list_lista_candidato()
{   
    
    $.ajax({
        url:"controller_func/lista_candidato/list.php"
    }).done(function(data){
        $('.table_l_c').empty();
        $('.table_l_c').append(data);        
    });
}

