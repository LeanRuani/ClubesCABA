$(function(){
	$("#search_from").submit(function(e){
		e.preventDefault();
	})

	$("#search").keyup(function(){
		var envio = $("#search").val();
		$('#resultados').html('<h2 style="color:black;"><img src="img/tierra.gif" width= "100px" alt="" /> Encontrando... </h2>');
		$.ajax({
			type: "POST",
			url: "php/buscador.php",
			data: ("search=" +envio),
			success: function(resp){
				if (resp!=""){
					$("#resultados").html(resp);
				}
			}
		})
	})
})	

function enviar_datos(){
	var barr=$("#comunaAvd option:selected").text();
	var act=$("#actividadAvd option:selected").text();
	
		$.ajax({
				type: "POST",
				url: "php/buscador2.php",
				data: {comuna:barr, actividad:act},
				success: function(res){
					if (res!=""){
						$("#resultados").html(res);
					}
				}
		})
}


$(function(){
	$("#comunaAvd").change(function(){
		$('#resultados').html('<h2><img src="img/tierra.gif" width= "100px"  text-align: center alt="" /> Encontrando... </h2>');
		enviar_datos();
	})
})

$(function(){
	$("#actividadAvd").change(function(){
		var actividad=$("#actividadAvd option:selected").text();
		$('#resultados').html('<h2><img src="img/tierra.gif" width= "100px"  text-align: center alt="" /> Encontrando... </h2>');
		enviar_datos();
	})
})