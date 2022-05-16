<?php
  require_once("../../config/conexion.php"); 


	if(isset($_SESSION["usu_id"])){
		
		$conn = new mysqli("localhost", "root", "", "clinicos_helpdesk1");
 
		if ($conn->connect_error):
			die("No se puede conectar!!: " . $conn->connect_error);
		endif;
	
		$sql="select * from tm_usuario
		where usu_id='".$_SESSION["usu_id"]."'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
     
		if($row['primera_vez'] == 0):
            header("Location:../Home/");
        endif;

?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Clinicos Nuevo Ticket  </title>
	<link rel="shortcut icon" href="../../public/img/solocicon.ico" type="image/x-icon">
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li class="active">Crear un Nuevo problema o una solicitud</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Por favor ingrese los datos acontinuación
				</p>
			

				<div class="row">
					<form method="post" id="ticket_form" enctype="multipart/form-data">

						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_titulo">Título</label>
								<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Título" data-toggle="tooltip" title="Indícanos el asunto de la solicitud o incidencia">

								<!--<div id="tooltip">Indiquenos el titulo de la solicitud o incidencia</div>-->
								<div>
								<style>
       								 #tooltip{
           								 background-color: #333; 
           								 color: #fff;
        								 padding: 5px 10px;
           								 border-radius: 4px;
           								 font-size: 15px;
           								 width: 15px;
       							 }
        
   							 </style>
							</div>
						<script>
							import { createPopper } from '@popperjs/core';
							import './styles.css';	
							const popcorn = document.querySelector('#popcorn');
							const tooltip = document.querySelector('#tooltip');

							createPopper(popcorn, tooltip, {
  							placement: 'top',
  							modifiers: [
   							 {
      							name: 'offset',
      							options: {
       						 offset: [0, 8],
      },
    },
  ],
});
						</script>
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoría</label>
								<select id="cat_id" name="cat_id" class="form-control" data-toggle="tooltip" title="Indícanos la categoría">
								
								</select>
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Servicio Afectado</label>
								<select id="subcat_id" name="subcat_id" class="form-control" data-toggle="tooltip" title="Indícanos el servicio que presenta afectación">
									
								</select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Sede</label>
								<select id="sedcat_id" name="sedcat_id" class="form-control" data-toggle="tooltip" title="Indícanos la sede donde se presenta la afectación">
									
								</select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Prioridad</label>
								<select id="pri_id" name="pri_id" class="form-control" data-toggle="tooltip" title="Indícanos que tan urgente es su solicitud">
							    

								</select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Impacto</label>
								<select id="impa_id" name="impa_id" class="form-control" data-toggle="tooltip" title="Indícanos el impacto que genera a tus labores o a tu área">
									
								</select>
							</fieldset>
						</div>
						<div class="col-lg-6">
						<label class="form-label semibold" for="tick_cel">Celular</label>
							<input type="text" class="form-control" id="tick_cel" name="tick_cel" placeholder="Ingrese Número de Celular" data-toggle="tooltip" title="Indícanos tu número de celular">
							<br>
						</div>
						<div class="col-lg-6">
							<label class="form-label semibold" for="tick_anydesk">Anydesk</label>
							<input type="text" class="form-control" id="tick_anydesk" name="tick_anydesk" placeholder="Ingrese Número de Anydesk" data-toggle="tooltip" title="Indícanos el número de anydesk de tu computador">
							<br>
						</div>
					
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput"><h6>Adjuntar archivo</h6></label>
								<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
							</fieldset>
						</div>

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_descrip">Descripción de la Incidencia o Solicitud</label>
								<div class="summernote-theme-1">
									<textarea id="tick_descrip" name="tick_descrip" class="summernote" name="name"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="nuevoticket.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>