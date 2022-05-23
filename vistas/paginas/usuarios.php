<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administración de Usuarios</h1>
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
                            <button type="button" class="btn btn-primary crear-usuarios" data-toggle="modal" data-target="#modal-crear-usuarios">
                            Crear Usuario
                            </button><br>
                        </div><br>

                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Nombre Completo</th>
                                        <th>Usuario</th>
                                        <th>Foto</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php  ?>

                                    <?php
                                     foreach($usuarios as $key => $value){

                                        $item = "id_rol";

                                        $valor = $value["rol"];

                                        $roles = ctrRoles::ctrMostrarRoles($item, $valor);

                                    ?>

                                    <tr>
                                        <td><?php echo ($key+1) ?></td>
                                        <td><?php echo $value["nombre"] ?></td>
                                        <td><?php echo $value["usuario"] ?></td>
                                        <td><img src="<?php echo $value["foto"] ?>" width="40" height="40"></td>
                                        <td><?php echo $roles["nom_rol"] ?></td>
                                        <td>
                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm btnEditarUsuario" data-toggle="modal" idUsuarioE="<?php echo $value["id_usuario"] ?>" data-target="#modal-editar-usuarios">
                                                    <i class="fa fa-pencil text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarUsuario" idUsuario="<?php echo $value["id_usuario"] ?>" rutaFoto="<?php echo $value["foto"]  ?>">
                                                    <i class="fa fa-trash"></i>
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

<!-- Modal Crear Usuarios -->

<div class="modal modal-default fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="alert alert-dismissible">Agregar Nuevo Usuario</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_usuarios" placeholder="Ingrese nombre completo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_user" placeholder="Ingrese usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="Ingrese clave">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fa fa-paperclip"></i> Adjuntar imagen de perfil
                        <input type="file" name="subirImgUsuarios">
                    </div>
                    <img class="previsualizarImgUsuarios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | peso max. 2mb | formato: jpg o png</p>
                </div>

                <div class="form-group has-feedback">
                    <label>rol</label>

                    <select class="form-control" name="rol_user" required>

                    <?php

                        $roles = ctrRoles::ctrMostrarRoles2();
                        
                        foreach($roles as $rol){
                            
                    ?>
                        <option value="<?php echo $rol["id_rol"] ?>"><?php echo $rol["nom_rol"] ?></option>
                        <?php
                       }

                    ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php

                $guardarUsuarios = new ctrUsuarios();
                $guardarUsuarios->ctrGuardarUsuarios();

                ?>

            </form>

        </div>
    </div>
</div>

<!-- Modal Editar Usuarios -->

<div class="modal modal-default fade" id="modal-editar-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="alert alert-dismissible ">Editar Datos de Usuario</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="idPerfilE" name="idPerfilE">
                    <input type="text" class="form-control" id="nom_usuariosE" name="nom_usuariosE">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="nom_userE" name="nom_userE">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="pass_userActualE" name="pass_userActualE">
                    <input type="password" class="form-control" id="pass_userE" name="pass_userE">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de usuarios
                        <input type="file" name="subirImgUsuariosE">
                    </div>
                    <input type="hidden" id="fotoActualE" name="fotoActualE">
                    <img class="previsualizarImgUsuarios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="form-group has-feedback">

                    <label>Rol</label> 
                    <select class="form-control" name="rol_userE" required>

                    <?php
                        $roles = ctrRoles::ctrMostrarRoles2();
                        
                        foreach($roles as $rol){
                            
                    ?>
                        <option value="<?php echo $rol["id_rol"] ?>"><?php echo $rol["nom_rol"] ?></option>
                    <?php
                        }
                    ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php 

                $editarusuarios = new ctrUsuarios();
                $editarusuarios->ctrEditarusuarios();
                 
                ?>

            </form>

        </div>
    </div>
</div>