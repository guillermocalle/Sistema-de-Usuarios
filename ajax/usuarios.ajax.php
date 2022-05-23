<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

    // Editar Usuarios

    public $idUsuario;

    public function ajaxEditarUsuarios(){

        $item = "id_usuario";
        $valor = $this->idUsuario; 

        $respuesta = ctrUsuarios::ctrMostrarUsuarios1($item, $valor);
        //return $respuesta;
        echo json_encode($respuesta);

    }

    // Eliminar Usuarios

    public $idEliminar;
    public $rutaFoto;

    public function ajaxEliminarUsuarios(){

        $respuesta = ctrUsuarios::ctrEliminarUsuarios($this->idEliminar , $this->rutaFoto);

        echo $respuesta;
     
    }

}

// Editar Usuarios

if(isset($_POST["idUsuarios"])){

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuarios"];
    $editar->ajaxEditarUsuarios();

}

//eliminar usuario

if(isset($_POST["idUsuarioE"])){

    $eliminar = new AjaxUsuarios();
    $eliminar->idEliminar = $_POST["idUsuarioE"];
    $eliminar->rutaFoto = $_POST["rutaFotoE"];
    $eliminar->ajaxEliminarUsuarios();
    
}


?>
