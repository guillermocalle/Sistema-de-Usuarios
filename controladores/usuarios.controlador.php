<?php

class ctrUsuarios{


    static public function ctrIngresoUsuarios(){

		if(isset($_POST["log_user"])){

			$encriptarPass=crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$tabla="usuarios";
			$item="usuario";
			$valor=$_POST["log_user"];

			$respuesta=mdlUsuarios::mdlMostrarUsuariosl($tabla , $item , $valor);

			if($respuesta["usuario"] == $_POST["log_user"]  && $respuesta["clave"] == $encriptarPass){

			$_SESSION["validarSession"] = "ok";
			$_SESSION["idBackend"] = $respuesta["id_usuario"];

				echo '<script>

					window.location = "usuarios";

				</script>';

			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";

			}

		}

	} 


    static public function ctrEliminarUsuarios($id, $rutafoto){

        unlink("../".$rutafoto);		

		$tabla = "usuarios";

		$respuesta = mdlUsuarios::mdlEliminarUsuarios($tabla, $id);

		return $respuesta;

    }

    
    static public function ctrMostrarUsuarios1($item, $valor){

        $tabla = "usuarios";

        $respuesta = mdlUsuarios::MdlMostrarUsuarios1($tabla, $item, $valor);

        return $respuesta;

    }


    static public function ctrMostrarUsuarios(){

        $tabla = "usuarios";

        $respuesta = mdlUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;

    }

  
	static public function ctrEditarusuarios(){

		if(isset($_POST["idPerfilE"])){

			if(isset($_FILES["subirImgUsuariosE"]["tmp_name"]) && !empty($_FILES["subirImgUsuariosE"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["subirImgUsuariosE"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

                    // Creando el directorio en donde se guarda la foto
					
					$directorio = "vistas/imagenes/usuarios";

                    // Preguntamos si existe otra imagen en la bd

                    if(isset($_POST["fotoActualE"])){
                        
                        unlink($_POST["fotoActualE"]);

                    }

                    // de acuedo al tipo de la foto aplicamos funciones de php

					if($_FILES["subirImgUsuariosE"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImgUsuariosE"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutas);	

					}

						else if($_FILES["subirImgUsuariosE"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgUsuariosE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
			
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutas);

					}else{

						echo'<script>

							swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}

				}

					if($rutas != ""){

                      $r = $rutas;

					}else{

					  $r = $_POST["fotoActualE"];

					}


					if($_POST["pass_userE"] != ""){

						$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 

					}else{

						$password = $_POST["pass_userActualE"];

					}

					$datos =array(  "idE" => $_POST["idPerfilE"],
									"nom_usuarioE" => $_POST["nom_usuariosE"],
									"nom_userE" => $_POST["nom_userE"],
									"passE" => $password,
									"rol_userE" => $_POST["rol_userE"],
									"img" => $r);

						$tabla="usuarios";

						$respuesta = mdlUsuarios::mdlEditarUsuarios($tabla,$datos);					

						if($respuesta == "ok"){

						echo'<script>

						    swal({
								    type:"success",
							  	    title: "¡CORRECTO!",
							  	    text: "El usuario ha sido editado correctamente",
							  	    showConfirmButton: true,
								    confirmButtonText: "Cerrar"
							  
						    }).then(function(result){

								    if(result.value){   
								        history.back();
								    } 
						    });

					    </script>';

				}else{

                    echo "<div class='alert alert-danger mt-3 small'>Error al editar</div>";

                }

		}

	}


    static public function ctrGuardarUsuarios(){

        if(isset($_POST["nom_usuarios"])){

            if(isset($_FILES["subirImgUsuarios"]["tmp_name"]) && !empty($_FILES["subirImgUsuarios"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["subirImgUsuarios"]["tmp_name"]);

                $nuevoAncho = 480;
                $nuevoAlto = 382;

                // Creando el directorio donde vamos a guardar la foto del usuario

                $directorio = "vistas/imagenes/usuarios";

                // De acuerdo al tipo de imagen aplicamos las funciones de php

                if($_FILES["subirImgUsuarios"]["type"] == "image/jpeg"){

                    $aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["subirImgUsuarios"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                else if($_FILES["subirImgUsuarios"]["type"] == "image/png"){

                    $aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["subirImgUsuarios"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }else{

                    echo'<script>
                    
                        swal({
                                type:"error",
                                title: "Corregir!",
                                text: "No se permiten formatos diferentes a JPG y/o PNG!",
                                ShowConfirmButton: true,
                                ConfirmButtonText: "Cerrar"
                        }).then(function(result){
                                if(result.value){
                                    history.back();
                                }
                        });

                    </script>';

                    return;
                }

                $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nom_usuario"=>$_POST["nom_usuarios"],
                               "nom_user"=>$_POST["nom_user"],
                               "pass_user"=>$encriptarPassword,
                               "rol_user"=>$_POST["rol_user"],
                               "foto"=>$ruta);
                        
                        echo "</pre>"; print_r($datos);echo "</pre>";

                $tabla = "usuarios";        

                $respuesta = mdlUsuarios::mdlGuardarUsuarios($tabla,$datos);

                if($respuesta == "ok"){

                    echo'<script>
                    
                        swal({
                                type:"success",
                                title: "Correcto!",
                                text: "El usuario ha sido creado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                history.back();
                            }

                        });

                    </script>';

                }else{

                    echo "<div class='alert alert-danger mt-3 small'>Error al crear usuario</div>";

                }

            }

        }

    }

}


?>