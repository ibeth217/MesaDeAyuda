
<?php
  require_once("../../config/conexion.php"); 
 if(isset($_SESSION["usu_id"])){ 

	$conn = new mysqli("localhost", "root", "", "clinicos_helpdesk1");
	//$conn = new mysqli("VMAEUClinicosNo","clinicoshelpdesk2","nNmMp9XlPKwzynA(","clinicos_helpdesk1");
 
	if ($conn->connect_error):
		die("No se puede conectar!!: " . $conn->connect_error);
	endif;

	$Usuarios="select * 
	FROM tm_usuario
    where usu_id='".$_SESSION["usu_id"]."'";
	$query=$conn->query($Usuarios);
	$row=$query->fetch_array();

	$TicketsUsuario=$row['usu_id'];

	$VerticketsPorUsuario="select * from
	tm_ticket
	where usu_id='$TicketsUsuario' 
	";
	$query=$conn->query($VerticketsPorUsuario);

	$VerTodosticketsUsuario="select * from
	tm_ticket
	order by tick_id desc
	";
	$queryTickets=$conn->query($VerTodosticketsUsuario);


?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Clínicos HelpDesk Home </title>
	<link rel="shortcut icon" href="../../public/img/solocicon.ico" type="image/x-icon">

	<?php require_once("../MainHeader/header.php");?>
	<?php require_once("../MainNav/nav.php");?>

	
</head>
<body class="with-side-menu">

   <!-- Contenido -->
		<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">

				<?php if ($_SESSION["rol_id"]==2):?>
					<div class="row">
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>

	                                <div class="number" id="lbltotal"></div>
	                                <div class="caption"><div>Total de Tickets</div></div>
	                            </div>
	                        </article>
	                    </div>
					
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lbltotalabierto"></div>
	                                <div class="caption"><div>Total de Tickets Abiertos</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lbltotalcerrado"></div>
	                                <div class="caption"><div>Total de Tickets Cerrados</div></div>
	                            </div>
								
			              </article>
				</div>
			</div>

			<section class="card">
				<header class="card-header">
					Grafico Estadístico
				</header>
				<div class="card-block">
					<div id="divgrafico" style="height: 250px;"></div>
				</div>
			</section>
			
		</div>
	</div>
					  <?php endif;?>			


			
			</div>
            
			<div class="block">
					<div class="block-header block-header-default">
						<h3 class="block-title"> <small>Historial Solicitudes</small></h3>
					</div>
					<div class="block-content block-content-full">
						<table id="partes_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
							<thead>
								<tr>
									<th style="width: 10%;font-weight:700 !important;">Ticket</th>
									<th style="width: 15%;">Fecha</th>
									<th class="d-none d-sm-table-cell" style="white-space: nowrap;">Asunto</th>
									<th class="d-none d-sm-table-cell" style="white-space: nowrap;">Descripción</th>
									<th class="d- none d-sm-table-cell" style="white-space: nowrap;">Estado</th>
								    <th class="d- none d-sm-table-cell" style="white-space: nowrap;">Fecha de cierre</th>
								</tr>
							</thead>
							<tbody>
							    <?php if($_SESSION["rol_id"]==1):?>
								<?php while($row =$query->fetch_array()):?>
                                <tr>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['tick_id'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['fech_crea']." - ".$row['hora'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['tick_titulo'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo nl2br($row['tick_descrip']);?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;font-size:24px;">
									<?php if($row['tick_estado']=='Abierto'):?>
									<span class="label label-pill label-danger fa-3x"><?php echo $row['tick_estado'];?></span>
									<?php elseif($row['tick_estado']=='Cerrado'):?>
									<span class="label label-pill label-success fa-3x"><?php echo $row['tick_estado'];?></span>	
									<?php else:?>
									<span class="label label-pill label-primary fa-3x"><?php echo $row['tick_estado'];?></span>		
									<?php endif;?>		
									
									
									</p></td>
									<td style="white-space: nowrap;">
									<?php if($row['tick_estado'] =='Cerrado'):
										echo $row['fech_cierre'];
										?>
										
									<?php endif;?>
									</td>
								</tr> 
								<?php endwhile;
								$conn->close();
								?>
								<?php else:?>

									<?php while($row =$queryTickets->fetch_array()):?>
                                <tr>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['tick_id'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['fech_crea']." - ".$row['hora'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo $row['tick_titulo'];?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;">
										<?php echo nl2br($row['tick_descrip']);?>
									</p></td>
									<td style="white-space: nowrap;"><p class="text-justify" style="font-weight:600 !important;font-size:24px;">
									<?php if($row['tick_estado']=='Abierto'):?>
									<span class="label label-pill label-danger fa-3x"><?php echo $row['tick_estado'];?></span>
									<?php elseif($row['tick_estado']=='Cerrado'):?>
									<span class="label label-pill label-success fa-3x"><?php echo $row['tick_estado'];?></span>	
									<?php else:?>
									<span class="label label-pill label-primary fa-3x"><?php echo $row['tick_estado'];?></span>		
									<?php endif;?>		
									
									
									</p></td>
									<td style="white-space: nowrap;">
									<?php if($row['tick_estado'] =='Cerrado'):
										echo $row['fech_cierre'];
										?>
										
									<?php endif;?>
									</td>
								</tr> 
								<?php endwhile;
								$conn->close();
								?>
                                <?php endif;?>
							</tbody>
						</table>
					</div>
				</div>


		</main>
		<!-- Contenido -->

		<div id="modaldetalle" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Detalle de Documentos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table id="detalle_data" class="table" width="100%">
							<thead>
								<tr>
									<th>Observación</th>
									<th>Archivo</th>
								</tr>
							</thead>
							<tbody>
							  
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="consultarstatus.js"></script>


													
	 <!-- Modal -->
<div id="CClavePrimeraVez" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" >&times;</button>
        <h4 class="modal-title">Debes cambiar tu clave!</h4>
      </div>
      <div class="modal-body">
        <p><input type="hidden" name="" id="IdUsuCambPass" value=""></p>
		<p class="text-justify" style="font-weight:600;">Nueva clave</p>
		<p class="py-3 text-center"><input type="password" name="" value="" class="form-control rounded" id="NewPass_"></p>
		<p class="text-justify" style="font-weight:600;">Confirma la nueva clave</p>
		<p class="py-3 text-center"><input type="password" name="" value="" class="form-control rounded" id="ConfirmNewPass_"></p>
		<p class="py-3 text-center"><button type="button" class="btn btn-success chpassw" >Cambiar</button></p>
		<div id="valcambiopass"></div> 
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" >Close</button>
      </div>
    </div>
	

	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="home.js"></script>
	
</body>
</html>
	
<?php
		
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }

?>
