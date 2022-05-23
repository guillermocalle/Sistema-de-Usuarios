<?php

require_once "../controladores/roles.controlador.php";
require_once "../modelos/roles.modelo.php";

class ajaxRoles{

    // Editar Roles

    public $idRoles;

    public function ajaxEditarRoles(){

        $item = "id_rol";
        $valor = $this->idRoles;

        $respuesta = ctrRoles::ctrVerRoles($item,$valor);

        echo json_encode($respuesta);

    }

    // Eliminar Roles

    public $idRolesE;

    public function ajaxEliminarRoles(){

        $valor = $this->idRolesE;

        $respuesta = ctrRoles::ctrEliminarRoles($valor);
    
        echo $respuesta;

    }

}

// Editar Roles

if(isset($_POST["idRoles"])){

    $editar = new ajaxRoles();
    $editar->idRoles = $_POST["idRoles"];
    $editar->ajaxEditarRoles();
    
}

// Eliminar Roles

if(isset($_POST["idRolE"])){

    $eliminar = new ajaxRoles();
    $eliminar->idRolesE = $_POST["idRolE"];
    $eliminar->ajaxEliminarRoles();
     
}


?>