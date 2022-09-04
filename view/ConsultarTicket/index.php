<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 

	$conn = new mysqli("localhost", "root", "", "clinicos_helpdesk1");
	//$conn = new mysqli("VMAEUClinicosNo","clinicoshelpdesk2","nNmMp9XlPKwzynA(","clinicos_helpdesk1");
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
	<title>ClínicosHelpdesk</title>
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
							<h3>Consultar Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">Nro.Ticket</th>
							<th style="width: 10%;">Categoría</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Usuario</th>
							<th class="d-none d-sm-table-cell" style="width: 20%;">Título</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Prioridad</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha y Hora Creación</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Asignación</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha y hora Cierre</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Soporte Asignado</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Sede</th>
							
							<th class="text-center" style="width: 3%;"></th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("modalasignar.php");?>

	<?php require_once("../MainJs/js.php");?>

     
		<div id="CambiarEstado" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Cambiar estado Ticket</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-justify"> Seleccione estado:</p>

						<select class="form-control rounded" id="EstadosTickets">
                             <option value="" selected>--Seleccione un estado---</option>
							 <option value="Abierto">Abierto</option>
							 <option value="En revision">En revision</option>
							 <option value="En Espera de Información del Usuario">En Espera de Información del Usuario</option>
							 <option value="Escalado a Proveedor">Escalado a Proveedor</option>
						</select>
						<input type="hidden" value="" id="TicktCambiarEstado">
						<hr>
						<button type="button" class="btn btn-success p-2 EscEstado fa-1x">Aceptar</button>
						<hr>
						<div id="ValidarEstadoTicket_" style="display:none;"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


	<script type="text/javascript" src="consultarticket.js"></script>


</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>