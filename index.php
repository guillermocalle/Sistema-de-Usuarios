<?php

include "controladores/plantilla.controlador.php";
include "controladores/usuarios.controlador.php";
include "controladores/roles.controlador.php";

include "modelos/usuarios.modelo.php";
include "modelos/roles.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

?>