<?php
    require_once("../config/conexion.php");
    require_once("../models/Sede.php");
    $sede = new Sede();

    switch($_GET["op"]){
        case "combo":
            echo " <option value='' selected>--Escoga sede---</option>";
            $datos = $sede->get_sede();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    echo "<option value='".$row['sedcat_id']."'>".$row['sedcat_nom']."</option>";
                }
                //echo $html;
            }
        break;
    }
?>