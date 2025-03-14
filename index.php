<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login</title>
    <link rel="stylesheet" href="complementos/css/Bootstrap v4.6.1.css" />
    <link rel="stylesheet" href="complementos/css/animate.css" />
    <link rel="stylesheet" href="complementos/complementos/css/sweetalert2.css" />
	<link rel='stylesheet' href='css/estilos.css' type='text/css' />	
	
</head>

<body>
	<header>
		<img src="image/Sisvot_G.png" class='imgLogin'/>
	</header>
	<div class="marcoLogin" >		
			<!-- 
				<form method='post' action='' onsubmit='loguear()' id='login'>			
					<label>Código:</label>
					<div class=''>
						<i class="fa fa-user"></i>
						<input type="text" name='userId' id='usu' value='' placeholder="Nombre de Usuario" class='form form-control'/>
					</div>
					<label>Contraseña:</label>
					<div class=''>
						<input type='password' name='ident' id='ident' value='' class="form form-control" />
					</div>
							
					<div class=''>
						<input type='submit' value='Ingresar' class='btn btn-primary'/>
					</div>
				</form> 
			-->
			<form name='formulario' method='post' action='' onsubmit='return logear()' target="_self" class="animated delay-1s faster zoomIn" id="frmLogin">
				<label for="userId">Nombre de Usuario</label>	
				<input name='userId' type="text" value="" required id='userId' class='form-control' placeholder="Nombre de Usuario">
				<label for="password">Contraseña</label>	
				<input name='password' type="password" value='' required id='password' class='form-control' placeholder="Contraseña">
				<button type="submit" name='boton' id='enviar' class="btn btn-success" style="margin-top: 30px; font-size: 1.5em; width: 30%;">Ingresar</button>
			</form>
			<div id='respuesta' style="display:none"></div>
		

	</div>
	<footer class="main-footer" style="padding-left:10px;">
		<div class="pull-right hidden-xs" style="padding-right: 10px;">
		<b>Version</b> 1.0.3
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
				<div class="panel-footer" style="padding:0px;">
						<span class="pull-left" style="font-size:9px;">
							Este Sistema está bajo una Licencia CC-BY-NC-ND 4.0 
							<i class="fa fa-arrow-circle-right"></i>
						</span>
						<div class="clearfix"></div>
				</div>
			</a>
			<div>
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
					<img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" />
				</a>
			</div>
		</div>
		<strong>Copyright &copy; 2017 <a href="http://marsoft-sas.com">Ing. Jose Alfredo Tapia</a>.</strong>
		Todos los derechos reservados.<br>
		cel: 3107358169<br>
		El Carmen de Bolívar -- Colombia
	</footer>
	<script src="js/jquery-3.6.js"></script>
	<script type='text/javascript' src='js/main.js'></script>
	<!-- <script type='text/javascript' src='js/bootstrap.min.js'></script> -->
</body>
</html>
