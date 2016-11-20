                        <?php
                        
                        //Controlando el inicio de la sesión
                        require'../../modelo/sessions.php';
                        $objses = new Sessions();
                        $objses->init();
                        
                        if(isset($_SESSION['usuario'])){
                        // se obtinen las variables de sesion
                        $nameU = $objses->get('usuario');
                        $idUse = $objses->get('id_usuario');
                        $idPro = $objses->get('id_privilegio');
                        $id_per = $objses->get('id_persona');
                        
                        
                        //Controlar el Perfil del acceso
                        
                        if($idPro != 1){
                        $objses->destroy();
                        header('Location: http://localhost:8080/Digemig/vista/error.php');
                        }
                        
                        
                        }else{
                        // si el usuario o contrase;a es erroneo redirecciona a error
                        $user = isset($nameU) ? $nameU : null ;
                        if($user == ''){
                        header('Location: http://localhost:8080/Digemig/vista/error.php');
                        }
                        }
                        
                        
                        ?>
                        <!DOCTYPE html>
                        <html lang="esp">
                        <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
                        <title>Index</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        
                        </head>
                        
                        
                        <head>
                        <meta charset="UTF-8">
                        <title>Menu</title>
                        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                        <link rel="stylesheet" href="../Css/estilos.css">
                        <link rel="stylesheet" href="../Css/fonts.css">
                        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
                        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
                        
                        
                        <link rel="stylesheet" href="../Css/footer.css">
                        
                        </head>
                        <header>
                        <div class="menu_bar">
                        <a href="#" class="bt-menu"><span class="icon-menu"></span>Menú</a>
                        </div>
                        <nav>
                        <ul>
                        <li><a href="#" style="text-decoration:none"><span class=""></span><font size="5">LOGO</font></a></li>
                        <li><a href="index_admin.php" style="text-decoration:none"><span class="icon-home"></span>Inicio</a></li>
                        <li><a href="panel.php" style="text-decoration:none"><span class="icon-suitcase"></span>Panel de Administrador</a></li>
                        <li><a href="#" style="text-decoration:none"><span class="icon-profile"></span></a></li>
                        <li class="submenu">
                        <a href="#"  style="text-decoration:none"><span class="icon-stats-bars"></span><span class="caret icon-arrow-down6"></span></a>
                        <ul class="children">
                        <li><a href="#"  style="text-decoration:none"> <span class="icon-dot"></span></a></li>
                        <li><a href="#"  style="text-decoration:none"><span class="icon-dot"></span></a></li>
                        <li><a href="#"  style="text-decoration:none"><span class="icon-dot"></span></a></li>
                        </ul>
                        </li>
                        <li><a href="#" style="text-decoration:none"><span class="icon-cog"></span></a></li>
                        <li><a href="../../modelo/log_out.php" style="text-decoration:none"><span class="icon-squared-cross"></span>Cerrar Sesion</a></li>
                        </ul>
                        </nav>
                        </header>
                        <br><br><br>