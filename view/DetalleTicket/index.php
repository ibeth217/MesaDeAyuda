<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
  <!DOCTYPE html>
  <html>
  <?php require_once("../MainHead/head.php"); ?>
  <title>Clínicos Detalle Ticket</title>
  <link rel="shortcut icon" href="../../public/img/solocicon.ico" type="image/x-icon">
  </head>

  <body class="with-side-menu">

    <?php require_once("../MainHeader/header.php"); ?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php"); ?>

    <!-- Contenido -->
    <div class="page-content">
      <div class="container-fluid">

        <header class="section-header">
          <div class="tbl">
            <div class="tbl-row">
              <div class="tbl-cell">
                <h3 id="lblnomidticket">Detalle Ticket - 1</h3>
                <span class="label label-pill label-primary" id="lblnomusuario"></span>
                <span class="label label-pill label-default" id="lblfechcrea" id="lblhoracrea"></span>
                <ol class="breadcrumb breadcrumb-simple">
                  <li><a href="#">Home</a></li>
                  <li class="active">Detalle Ticket</li>
                </ol>
              </div>
            </div>
          </div>
        </header>

        <div class="box-typical box-typical-padding">
          <div class="row">

              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Titulo</label>
                  <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="sedcat_nom">Sede</label>
                  <input type="text" class="form-control" id="sedcat_nom" name="sedcat_nom" readonly>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="cat_nom">Categoria</label>
                  <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                </fieldset>
              </div>    
              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_cel">Celular</label>
                  <input type="text" class="form-control" id="tick_cel" name="tick_cel" readonly>
                </fieldset>
              </div> 
              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_anydesk">Anydesk</label>
                  <input type="text" class="form-control" id="tick_anydesk" name="tick_anydesk" readonly>
                </fieldset>
              </div> 
              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_usuafect">Usuario Afectado</label>
                  <input type="text" class="form-control" id="tick_usuafect" name="tick_usuafect" readonly>
                </fieldset>
              </div> 
              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_solicitud">Tipo de solicitud</label>
                  <input type="text" class="form-control" id="tick_solicitud" name="tick_solicitud" readonly>
                </fieldset>
              </div> 
               

              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Documentos Adicionales</label>
                  <table id="documentos_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                      <tr>
                        <th style="width: 90%;">Nombre</th>
                        <th class="text-center" style="width: 10%;"></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </fieldset>
              </div>


              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descripusu">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descripusu" name="tickd_descripusu" class="summernote" name="name"></textarea>
                  </div>

                  <label class="form-label semibold" for="tick_titulo">Documentos Adicionales</label>
                  <table id="documentos_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                      <tr>
                        <th style="width: 90%;">Nombre</th>
                        <th class="text-center" style="width: 10%;"></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>

                </fieldset>
              </div>

          </div>
        </div>

        <section class="activity-line" id="lbldetalle">

        </section>

        <div class="box-typical box-typical-padding" id="pnldetalle">
          <p>
            Ingrese su duda o consulta
          </p>
          <div class="row">
              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descrip">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descrip" name="tickd_descrip" class="summernote" name="name"></textarea>
                  </div>
                  <div class="col-lg-4">
                        <fieldset class="form-group">
                          <label class="form-label semibold" for="exampleInput"><h6>Adjuntar archivo</h6></label>
                          <input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
                        </fieldset>
                  </div>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <button type="button" id="btnenviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                <button type="button" id="btncerrarticket" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
              </div>
          </div>
			  </div>

      </div>
    </div>
    <!-- Contenido -->

    <?php require_once("../MainJs/js.php"); ?>

    <script type="text/javascript" src="detalleticket.js"></script>

  </body>

  </html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>