<?php
    require_once("../config/conexion.php");
    require_once("../models/Prioridad.php");
    $prioridad = new Prioridad();

    switch($_GET["op"]){
        case "combo":
            echo " <option value='' selected>--Escoga prioridad---</option>";
            $datos = $prioridad->get_prioridad();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    echo "<option value='".$row['pri_id']."'>".$row['pri_nom']."</option>";
                }
                //echo $html;
            }
        break;
    }
?>