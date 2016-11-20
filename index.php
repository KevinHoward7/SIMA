<?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>

<!DOCTYPE html>

<html lang="esp">

	<head>
    	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Index</title>
	<link rel="stylesheet" href="vista/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vista/Css/Style.css">
	
	
    </head>
    
    <body>
    
    <div class="container">
	<div class="card card card-container">
           <img id="profile-img" class="profile-img-card" src="vista/img/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
    
    	<form name="user" action="modelo/session_init.php" method="post">
        	<?php if($err==1){
				echo "<div class='alert alert-danger'>"."Usuario o Contraseña incorectos"."</div>"."<br />";
			}
			if($err==2){
				echo "<div class='alert alert-danger'>"."Debe iniciar sesion para ingresar al sitio"."</div>"."<br />";
			}
			?>
        	<label>Email</label><br />
            <input type="usuario" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su Email" required autofocus/><br />
            <label>Contraseña</label><br />
            <input type="password" name="pass" id="pass"  class="form-control" placeholder="Ingrese su Contraseña" required/><br />
            <input type="submit" name="enter" id="enter" value="Iniciar Sesion" class="btn btn-signin btn-block btn-success" /> <br><br>       
        </form>
         <center><a href="vista/usuario/index_usuario.php"><button type="button"  class="btn  btn-success"><i class='glyphicon glyphicon-home'></i>  Inicio</button></a> </center> 
        </div>
        </div>
    </body>
    
</html>