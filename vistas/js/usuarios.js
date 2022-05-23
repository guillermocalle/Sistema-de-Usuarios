// Implementacion de DataTables

$(".tablaUsuarios").DataTable({
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

// Subir imagen temporal usuarios

$("input[name='subirImgUsuarios']").change(function(){

    var imagen = this.files[0];
    
	// Validando el formato de la imagen sea jpg o png
  
      if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  
        $("input[name='subirImgUsuarios']").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else if(imagen["size"] > 2000000){
  
        $("input[name='subirImgUsuarios']").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else{
  
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
  
        $(datosImagen).on("load", function(event){
  
          var rutaImagen = event.target.result;
  
          $(".previsualizarImgUsuarios").attr("src", rutaImagen);
  
        })
  
      }
  
  })

// Subir imagen temporal editar usuarios

$("input[name='subirImgUsuariosE']").change(function(){

	var imagen = this.files[0];

	// Validamos el formato de la imagen sea jpg o png
  
	  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  
		$("input[name='subirImgUsuariosE']").val("");
  
		 swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		  });
  
	  }else if(imagen["size"] > 2000000){
  
		$("input[name='subirImgUsuariosE']").val("");
  
		 swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		  });
  
	  }else{
  
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
  
		$(datosImagen).on("load", function(event){
  
		  var rutaImagen = event.target.result;
  
		  $(".previsualizarImgUsuarios").attr("src", rutaImagen);
  
		})
  
	  }
  
  })
  
// Editar Usuarios 

$(".tablaUsuarios").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuarioE");

	var datos = new FormData();

	// datos.append("idUsuario", idUsuario);
	datos.append("idUsuarios", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#idPerfilE").val(respuesta["id_usuario"]);
			$("#nom_usuariosE").val(respuesta["nombre"]);
			$("#nom_userE").val(respuesta["usuario"]); 
			$("#pass_userE").val(respuesta["clave"]);
			$(".previsualizarImgUsuarios").attr("src", respuesta["foto"]);
			$("#fotoActualE").val(respuesta["foto"]);
			$("#pass_userActualE").val(respuesta["clave"]);

			$('input[name="subirImgUsuariosE"]').val(respuesta["foto"]);
			
		}

	})

})

// Eliminar Usuarios

$(document).on("click", ".eliminarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	var rutaFoto = $(this).attr("rutaFoto");
	
	swal({
		title: '¿Está seguro de eliminar este usario?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!'
	}).then(function(result){

		if (result.value) {

			var datos = new FormData();
			datos.append("idUsuarioE", idUsuario);
			datos.append("rutaFotoE", rutaFoto);
			
			$.ajax({

				url: "ajax/usuarios.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function (respuesta) {

					console.log(respuesta);

					if (respuesta == "ok") {
						swal({
							type: "success",
							title: "¡CORRECTO!",
							text: "El usuario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {

							if (result.value){

								window.location = "usuarios";
								
                     }
					 
                })

             }

          }

        })

      }

    })

})




