<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
  };
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Clínicos Helpdesk Informes</title>
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

    <div class="container">
        <section class="row">
            <div class="col-md-12">
                <h1 class="text-center">Informes</h1>
            </div>
        </section>
        <hr><br />
        <section class="row">
            <section class="col-md-12">
                <h3>Filtre los datos a solicitar</h3>
                <p></p>
            </section>
        </section>
        <section class="row">
            <section class="col-md-12">
                <section class="row">
                    <div class="col-md-4">
                        <label for="tipoAtencion">Reporte</label>
                        <select class="form-control" id="tipoAtencion">
                            <option value="ce">Seleccione ......</option>
                            <option value="farm">Tickets abiertos</option>
                            <option value="fisi">Tickets vencidos</option>
                            <option value="fo"></option>
                            <option value="hosp"></option>
                            <option value="odon"></option>
                            <option value="pyp"></option>
                            <option value="rx"></option>
                            <option value="urge"></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fechaActual">Fecha desde</label>
                            <input type="date" class="form-control" id="fechaActual" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fechaActencion">Fecha hasta</label>
                            <input type="date" class="form-control" id="fechaAtencion" required>
                        </div>
           
                    </div>
                    <div class="col-md-8">
                        <label for="tipoAtencion">Categoría</label>
                        <select class="form-control" id="tipoAtencion">
                            <option value="ce">Seleecione</option>
                            <option value="farm">Tickets Abiertos</option>
                            <option value="fisi">Tickets Cerrados</option>
                            <option value="fo">Tickets en revisión</option>
                            <option value="hosp"></option>
                            <option value="odon"></option>
                            <option value="pyp"></option>
                            <option value="rx"></option>
                            <option value="urge"></option>
                        </select>
                    </div>
                </section>
                <section class="row">
                    <div class="col-md-4">
                        <label for="tipoAtencion">Prioridad</label>
                        <select class="form-control" id="tipoAtencion">
                            <option value="ce"></option>
                            <option value="farm"></option>
                            <option value="fisi"></option>
                            <option value="fo"></option>
                            <option value="hosp"></option>
                            <option value="odon"></option>
                            <option value="pyp"></option>
                            <option value="rx"></option>
                            <option value="urge"></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoAtencion">Asignado a</label>
                        <select class="form-control" id="tipoAtencion">
                            <option value="ce"></option>
                            <option value="farm"></option>
                            <option value="fisi"></option>
                            <option value="fo"></option>
                            <option value="hosp"></option>
                            <option value="odon"></option>
                            <option value="pyp"></option>
                            <option value="rx"></option>
                            <option value="urge"></option>
                        </select>
                </section>
            </section>
        </section>
        <hr />

        <section class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-info theme-blue" id="saveForm" onclick="saveForm">Filtrar</button>
            </div>
        </section>
    </div>

    <?php require_once("../MainJs/js.php");?>
	<script src="../../public/js/lib/select2/select2.full.min.js"></script>
	<script type="text/javascript" src="mntusuario.js"></script>

<script>
    $("#input-3").rating({ 
        showCaption: false
    });
  

    $('#input-3').on('rating.change', function() {
        console.log($('#input-3').val());
    });
</script>
</body>
</html>