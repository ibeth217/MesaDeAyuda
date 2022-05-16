<?php
    class Impacto extends Conectar{

        public function get_impacto(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_impacto WHERE est=1 ORDER BY impa_nom ASC;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>