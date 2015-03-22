function DescripcionJuego(IdJuego){
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

function Terminar(user){
	
	$.ajax({
		url:"../Controladores/Controller_Prestamo.php",
		type:"post",
		data:{CARRITO: user},
		dataType:"json",
		success:function(data){

		}
	});
	alert("Se alquilaron todos los Juegos con exito!.")
	window.location.href = "Inicio.php"
}
