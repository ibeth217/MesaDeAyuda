<?php
    require_once("../config/conexion.php");
    require_once("../models/Impacto.php");
    $impacto = new Impacto();

    switch($_GET["op"]){
        case "combo":
            echo " <option value='' selected>--Seleccione impacto---</option>";
            $datos = $impacto->get_impacto();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    echo "<option value='".$row['impa_id']."'>".$row['impa_nom']."</option>";
                }
                //echo $html;
            }
        break;
    }
?>