function DescripcionJuego(IdJuego){
	$.ajax({
		url:"VerJuego.php",
		type:"get",
		data:{ID: IdJuego},
		dataType:"json",
		success:function(data){
			
		}
	});
	window.location.href = "VerJuego.php?ID="+IdJuego+""
}

function AgregarCarrito(IdJuego, precio){
	var tiempo=$("#tiempo").val()	
	if(tiempo>0){
		var pago =  parseFloat(tiempo) * parseFloat(precio)
		$.ajax({
		url:"../Controladores/Controller_Carrito.php",
		type:"post",
		data:{JUEGO: IdJuego, TIEMPO:tiempo , PAGO: pago },
		dataType:"json",
		success:function(data){
				
		}
	});
	alert("Se agrego al carrito")	
	$("#tiempo").val("")		
	}

}


function Alquilar(IdJuego , User, precio){
	var tiempo=$("#tiempo").val()
	var total =  parseFloat(tiempo) * parseFloat(precio)
	$.ajax({
		url:"../Controladores/Controller_Prestamo.php",
		type:"post",
		data:{JUEGO: IdJuego, USER: User, TIEMPO:tiempo , PAGO: total },
		dataType:"json",
		success:function(data){
			alert("Se ha alquilado el juego por "+tiempo+" día(s), costo= "+total)		
		}
	});
	
	var tiempo=$("#tiempo").val("")
	window.location.href = "Inicio.php"
}
