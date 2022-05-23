<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de Roles</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">

                        <div class="card-header">

                            <button type="button" class="btn btn-primary crear-rol" data-toggle="modal"
                                data-target="#modal-crear-roles">
                                Crear Rol
                            </button><br>

                        </div><br>

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaRoles" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Nombre de Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                        foreach($roles as $key => $value){  

                                    ?>

                                    <tr>
                                        <td><?php echo ($key+1)  ?></td>
                                        <td><?php echo $value["nom_rol"]  ?></td>
                                        <td>
                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm btnEditarRoles"
                                                    data-toggle="modal" idRol="<?php echo $value["id_rol"]  ?>"
                                                    data-target="#modal-editar-rol">
                                                    <i class="fa fa-pencil text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarRol"
                                                    idRolesE="<?php echo $value["id_rol"]  ?>" ?>
                                                    <i class=" fa fa-trash"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>

                                    <?php 

                                        }

                                    ?>

                                </tbody>

                            </table>

                        </div>
 
                        <div class="card-footer">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Modal Crear Roles -->

<div class="modal modal-default fade" id="modal-crear-roles">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="alert alert-dismissible ">Agregar Nuevo Rol</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_rol" placeholder="Ingrese nombre del rol">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php 

                $guardarRol = new ctrRoles();
                $guardarRol->ctrGuardarRol();
                
                ?>

            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Roles -->

<div class="modal modal-default fade" id="modal-editar-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="alert alert-dismissible ">Editar Datos de Rol</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="id_rolE">
                    <input type="text" class="form-control" name="nom_rolE">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php 

                    $editarRol = new ctrRoles();
                    $editarRol->ctrEditarRol();
                
                ?>

            </form>
        </div>
    </div>
</div>