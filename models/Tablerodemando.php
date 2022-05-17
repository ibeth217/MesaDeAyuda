<?php
    class Reportes extends Conectar{

        public function get_reportes($fecha_ini,$fecha_fin){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_ WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>