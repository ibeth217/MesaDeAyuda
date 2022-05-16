<?php
    require_once("../config/conexion.php");
    require_once("../models/Subcategoria.php");
    $subcategoria = new Subcategoria();

    switch($_GET["op"]){
        case "combo":
            $datos = $subcategoria->get_subcategoria($_POST["cat_id"]);
            $html="";
            echo "<option value='' selected>--Seleccione servicio afectado--</option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                   
                    echo "<option value='".$row['subcat_id']."'>".$row['subcat_nom']."</option>";
                }
                //echo $html;
            }
        break;
    }
?>