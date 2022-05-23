<body class="hold-transition login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="../../index2.html"><b>Sistema de Usuarios</b></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg"><b>Iniciar Sesion</b></p>

            <form method="post">

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="log_user" placeholder="Usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="log_pass" placeholder="Clave">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">     
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>

                <?php 

                $ingreso = new ctrUsuarios();
                $ingreso->ctrIngresoUsuarios();

                ?>

            </form>

        </div>

    </div>

</body>

</html>