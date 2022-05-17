<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

        <div class="alert alert-success">
		<title>Recuperar Password</title>
        <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	    <link href="img/favicon.png" rel="icon" type="image/png">
	    <link href="img/favicon.ico" rel="shortcut icon">

        <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
        <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/main.css">
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link rel="shortcut icon" href="../../public/img/solocicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Password</div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
                    <strong> </strong> Indicanos tu correo electronico para poder restablecer tu contraseña</div>
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
								</div>
							</div>    
						</form>
					</div>                     
				</div>  
			</div>
		</div>
        
<script src="public/js/lib/jquery/jquery.min.js"></script>
<script src="public/js/lib/tether/tether.min.js"></script>
<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="public/js/plugins.js"></script>
<script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
	</body>
</html>							