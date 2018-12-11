




<body>

	<center>
		<header>        
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<div style=" height: 20px;">
							<img src="lib/img/piedepagina.png" style="height: 50px;"/>
						</div>
					</div>
				</div>
			</div>
			<br>                
			<br>     
		</header>
	</center>

	<div class="container">
		<div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
			<form class="form" role="form" method="post" action="" >
				<div class="card card-login">
					<div class="card-header card-header-success text-center">
						<h4 class="card-title">Sistema de Seguimiento de los Pacientes de la Dirección de Salud Ambiental</h4>

					</div>
					<div class="card-body">
						<p class="card-description text-center" style="color:black">Ingrese los datos para acceder</p>
						<span class="bmd-form-group">
							<div class="form-group label-floating has-success">                
								<label for="usuario" class="bmd-label-floating">Usuario</label>
								<input type="text" class="form-control" name="login" id="loginusuario">
							</div>
						</span>
						<span class="bmd-form-group">
							<div class="form-group label-floating has-success">                
								<label for="clave" class="bmd-label-floating">Contraseña</label>
								<input type="password" class="form-control" name="clave" id="claveusuario">
							</div>
						</span>          
					</div>
					<div class="card-footer justify-content-center">
						

						<!-- <button class="btn btn-success btn-round">Round</button> -->
						<input class="btn" type="hidden" name="logear" value="si">
						<input class="btn btn-success btn-round fa-fa-sign-in" type="submit" name="iniciar" value="Iniciar sesión">

					</div>
				</div>
			</form>
		</div>
		<footer class="footer">
			<div class="container">
				<nav class="float-center">
					<ul>
						<li>               
							Uptaeb -               
						</li>
						<li>
							PNFI -              
						</li>
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>
						Copyright    

					</ul>
				</nav>    
			</div>
		</footer>
	</div>

	<?php require_once("vista/pie.php"); ?>



