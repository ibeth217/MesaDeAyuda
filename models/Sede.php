<?php
    class Sede extends Conectar{

        public function get_sede(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sede WHERE est=1 ORDER BY sedcat_nom ASC;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>