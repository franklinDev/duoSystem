$(document).ready(function () {
   
    $('.status_link').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/getAtividadesStatus/" + $(this).attr('data-id'),
            success: function(result){
            	if (result != '') {
					atualizaGrid(jQuery.parseJSON(result))
            	}          
        }});
    });

    $('.situacao_link').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/getAtividadesSituacao/" + $(this).attr('data-id'),
            success: function(result){
                if (result != '') {
					atualizaGrid( jQuery.parseJSON(result) )
            	}
            }
        });
    });

    function atualizaGrid (result)
    {
    	$('.row-atividade').remove();
		
		for (i = 0; i < result.length; i++) { 		   
		    if (result[i].concluido == true) {
		    	style = "style='background-color: #dff0d8'";
		    } else {
		    	style = '';
		    }
		    
		    list = "<tr class='row-atividade' "+style+">";
		    list += "<td><a href='/editar/'"+result[i].id+"><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span> Editar</button></a></td>";
		    list += "<td>"+result[i].nome+"</td>";
		    list += "<td>"+result[i].descricao+"</td>";
		    list += "<td>"+result[i].dt_inicio+"</td>";
		    list += "<td>"+result[i].dt_fim+"</td>";
		    list += "<td>"+result[i].status_descricao+"</td>";
		    list += "<td>"+result[i].dt_inicio+"</td>";
		    list += "<td>"+result[i].situacao+"</td>";
		    list += "</tr>";

			$('.tab-atividade').append(list);		
			$('.pagination').remove();		
		}

  
    }

});