<?php
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    ini_set('date.timezone','America/Bogota'); 
    $ticket = new Ticket();

    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    require_once("../models/Documento.php");
    $documento = new Documento();
    $hora=date("H:i:s");
    $fecha=date("Y-m-d H:i:s");

    switch($_GET["op"]){

        case "insert":
            $datos=$ticket->insert_ticket($_POST["usu_id"],$_POST["cat_id"],$_POST["tick_titulo"],$_POST["tick_descrip"],$fecha,$hora,$_POST["pri_id"],$_POST["tick_cel"],$_POST["tick_anydesk"],$_POST["sedcat_id"],$_POST["tick_empresa"],$_POST["tick_solicitud"],$_POST["tick_usuafect"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach ($datos as $row){
                    $output["tick_id"] = $row["tick_id"];

                    if (empty($_FILES['files']['name'])){

                    }else{
                        $countfiles = count($_FILES['files']['name']);
                        $ruta = "../public/document/".$output["tick_id"]."/";
                        $files_arr = array();

                        if (!file_exists($ruta)) {
                            mkdir($ruta, 0777, true);
                        }

                        for ($index = 0; $index < $countfiles; $index++) {
                            $doc = $_FILES['files']['tmp_name'][$index];
                            $destino = $ruta.$_FILES['files']['name'][$index];

                            $documento->insert_documento( $output["tick_id"],$_FILES['files']['name'][$index]);

                            move_uploaded_file($doc,$destino);
                        }
                    }
                }
            }
            echo json_encode($datos);
        break;

        case "update":
            $ticket->update_ticket($_POST["tick_id"]);
            //$ticket->insert_ticketdetalle_cerrar($_POST["tick_id"],$_POST["usu_id"]);
            
        break;

        case "reabrir":
            $ticket->reabrir_ticket($_POST["tick_id"]);
            $ticket->insert_ticketdetalle_reabrir($_POST["tick_id"],$_POST["usu_id"]);
        break;

        case "asignar":
            $ticket->update_ticket_asignacion($_POST["tick_id"],$_POST["usu_asig"]);
        break;

        case "listar_x_usu":
            $datos=$ticket->listar_ticket_x_usu($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row['usu_nom'].' '.$row['usu_ape'];
                $sub_array[] = $row["tick_titulo"];
                $sub_array[] = $row["pri_nom"];
                $Hora=$row["hora"];

                if ($row["tick_estado"]=="Abierto"){

                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }
                else if($row["tick_estado"]=="Escalado a Proveedor"){
                    
                        if ($row["tick_estado"]=="Escalado a Proveedor"){
                                $sub_array[] = '<span class="label label-pill label-success ">Escalado a Proveedor</span>';
                        }else{
                                
                            if ($row["tick_estado"]=="En revision"){
                                $sub_array[] = '<span class="label label-pill label-primary">En revision</span>';
                            } else{
                                $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span></a>';
                            }   
                        }   
                                        
                }
                else {

                    if ($row["tick_estado"]=="En Espera de Información del Usuario")
                    {
                        $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-warning">En Espera de Información del Usuario</span></a>';
                    }
                    else{

                        if ($row["tick_estado"]=="En revision"){
                            $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-primary">En revision</span></a>';
        
                        }
                        else{
                            $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span><a>';
                        }                    
                    
                    } 

                }


                $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_crea"]));
                
                
                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_asig"]));
                }
                
                //$sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_crea"])).$Hora;

                if($row["fech_cierre"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Cerrar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_cierre"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-warning">Sin Asignar</span>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        $sub_array[] = '<span class="label label-pill label-success">'.$row1['usu_nom'].' '.$row1['usu_ape'].'</span>';
                    }
                }

                $sub_array[] = '<a href="#" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';
                $sub_array[] = $row["tick_usuafect"];
                $sub_array[] = $row["tick_solicitud"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,                
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listar":
            $datos=$ticket->listar_ticket();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row['usu_nom'].' '.$row['usu_ape'];
                $sub_array[] = $row["tick_titulo"];
                $sub_array[] = $row["pri_nom"];

                $Hora=$row["hora"];               

                if ($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-success">Abierto</span></a>';
                }else if($row["tick_estado"]=="Escalado a Proveedor"){

                    if ($row["tick_estado"]=="Escalado a Proveedor"){
                            $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-success">Escalado a Proveedor</span></a>';
                    }else{

                        if ($row["tick_estado"]=="En revision"){
                            $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-primary">En revision</span></a>';
        
                        } else{
                            $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span><a>';
                        }
                        
                    }   

                }
                else{
                    if ($row["tick_estado"]=="En Espera de Información del Usuario"){
                        $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-warning">En Espera de Información del Usuario</span></a>';
                    }else{

                    if ($row["tick_estado"]=="En revision"){
                        $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-primary">En revision</span></a>';
    
                    }
                    else{
                        $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span><a>';
                    }                    
                    
                    } 

                }

                $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["fech_cierre"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Cerrar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_cierre"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="label label-pill label-warning">Sin Asignar</span></a>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        //$sub_array[] = '<span class="label label-pill label-success">'.$row1['usu_nom'].' '.$row1['usu_ape'].'</span>';
                        $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="label label-pill label-success">'.$row1['usu_nom'].' '.$row1['usu_ape'].'</span></a>';
                    }
                }
                $sub_array[] = $row["sedcat_nom"];

                $sub_array[] = '<a href="#" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';
                $sub_array[] = $row["tick_usuafect"];
                $sub_array[] = $row["tick_solicitud"];
               
                $data[] = $sub_array;
                
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listar2":
            $datos=$ticket->listar_ticket_2();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row['usu_nom'].' '.$row['usu_ape'];
                $sub_array[] = $row["tick_titulo"];
                

                $sub_array[] = $row["pri_nom"];

                $Hora=$row["hora"];
                

                if ($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-success">Abierto</span></a>';
                }else if($row["tick_estado"]=="Escalado a Proveedor"){

                    if ($row["tick_estado"]=="Escalado a Proveedor"){
                            $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-success">Escalado a Proveedor</span></a>';
                    }else{

                        if ($row["tick_estado"]=="En revision"){
                            $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-primary">En revision</span></a>';
        
                        } else{
                            $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span><a>';
                        }
                        
                    }   

                }
                else{
                    if ($row["tick_estado"]=="En Espera de Información del Usuario"){
                        $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-warning">En Espera de Información del Usuario</span></a>';
                    }else{

                    if ($row["tick_estado"]=="En revision"){
                        $sub_array[] = '<a href="#" data-toggle="modal" data-target="#CambiarEstado" data-id="'.$row["tick_id"].'" class="IdeTicket"><span class="label label-pill label-primary">En revision</span></a>';
    
                    }
                    else{
                        $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="label label-pill label-danger">Cerrado</span><a>';
                    }                    
                    
                    } 

                }

                $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["fech_cierre"]==null){
                    $sub_array[] = '<span class="label label-pill label-default">Sin Cerrar</span>';
                }else{
                    $sub_array[] = date("Y-m-d H:i:s", strtotime($row["fech_cierre"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="label label-pill label-warning">Sin Asignar</span></a>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        //$sub_array[] = '<span class="label label-pill label-success">'.$row1['usu_nom'].' '.$row1['usu_ape'].'</span>';
                        $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="label label-pill label-success">'.$row1['usu_nom'].' '.$row1['usu_ape'].'</span></a>';
                    }
                }
                $sub_array[] = $row["sedcat_nom"];

                $sub_array[] = '<a href="#" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';

                $sub_array[] = $row["tick_usuafect"];
                $sub_array[] = $row["tick_solicitud"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listardetalle":
            $datos=$ticket->listar_ticketdetalle_x_ticket($_POST["tick_id"]);
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <?php echo date("Y-m-d H:i:s", strtotime($row["fech_crea"]));?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user">
                                        <div class="activity-line-item-user-photo">
                                            <a href="#">
                                                <img src="../../public/<?php echo $row['rol_id'] ?>.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="activity-line-item-user-name"><?php echo $row['usu_nom'].' '.$row['usu_ape'];?></div>
                                        <div class="activity-line-item-user-status">
                                            <?php 
                                                if ($row['rol_id']==1){
                                                    echo 'Usuario';
                                                }else{
                                                    echo 'Soporte';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p>
                                                    <?php echo $row["tickd_descrip"];?>
                                                </p>
                                            
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </article>
                        <?php
                    }
                ?>
            <?php
        break;

        case "mostrar":
            $datos=$ticket->listar_ticket_x_id($_POST["tick_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["tick_id"] = $row["tick_id"];
                    $output["usu_id"] = $row["usu_id"];
                  
                    $output["cat_id"] = $row["cat_id"];
                    $output["usu_nom"] = $row["usu_nom"];

                    $output["tick_titulo"] = $row["tick_titulo"];
                    $output["tick_descrip"] = $row["tick_descrip"];
                    $output["sedcat_nom"] = $row["sedcat_nom"];

                    if ($row["tick_estado"]=="Abierto"){
                        $output["tick_estado"] = '<span class="label label-pill label-success">Abierto</span>';
                    }else{
                        $output["tick_estado"] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }

                    $output["tick_estado_texto"] = $row["tick_estado"];

                    $output["fech_crea"] = date("Y-m-d H:i:s", strtotime($row["fech_crea"]));
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["cat_nom"] = $row["cat_nom"];
                    $output["tick_cel"] = $row["tick_cel"];
                    $output["tick_anydesk"] = $row["tick_anydesk"];
                    $output["tick_usuafect"] = $row["tick_usuafect"];
                    $output["tick_solicitud"] = $row["tick_solicitud"];
                    
                }
                echo json_encode($output);
            }   
        break;

        case "insertdetalle":
            $tick_id = $_POST['tick_id'];
            $usu_id = $_POST['usu_id'];
            $tickd_descrip = $_POST['tickd_descrip'];
            //print_r($tick_id. ' ' .$usu_id. ' ' .$tickd_descrip);die();
            //print_r($_FILES);die();
            
            $ticket->insert_ticketdetalle($_POST["tick_id"],$_POST["usu_id"],$_POST["tickd_descrip"]);
            
            if (empty($_FILES['files']['name'])){
                die('Entro');
            }else{
                
                $countfiles = count($_FILES['files']['name']);
                //$countfiles = 1;
                $ruta = "../public/document/".$_POST["tick_id"]."/";
                $files_arr = array();
                //var_dump ($ruta);
                print_r($ruta);

                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }
                
                for ($index = 0; $index < $countfiles; $index++) {
                    $doc = $_FILES['files']['tmp_name'][$index];
                    $destino = $ruta.$_FILES['files']['name'][$index];
                    $documento->insert_documento( $_POST["tick_id"],$_FILES['files']['name'][$index]);

                    move_uploaded_file($doc,$destino);
                }


            }
        break;

        case "total";
            $datos=$ticket->get_ticket_total();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "totalabierto";
            $datos=$ticket->get_ticket_totalabierto();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "totalcerrado";
            $datos=$ticket->get_ticket_totalcerrado();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "grafico";
            $datos=$ticket->get_ticket_grafico();  
            echo json_encode($datos);
        break;

        case "CambEstado";
        $ticket->update_ticket_estado($_POST["tick_id"],$_POST["tick_estado"]);
        break;

    }
?>