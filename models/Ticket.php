<?php
    class Ticket extends Conectar{

        public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip,$tick_fecha,$tick_hora,$pri_id,$tick_cel,$tick_anydesk,$sedcat_id,$tick_empresa,$tick_solicitud,$tick_usuafect){
           
            try {
              
          
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_ticket (tick_id,usu_id,cat_id,tick_titulo,tick_descrip,tick_estado,fech_crea,hora,usu_asig,fech_asig,pri_id,est,tick_cel,tick_anydesk,sedcat_id,tick_empresa,tick_solicitud,tick_usuafect) VALUES (NULL,?,?,?,?,'Abierto',?,?,NULL,NULL,?,'1',?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $cat_id);
            $sql->bindValue(3, $tick_titulo);
            $sql->bindValue(4, $tick_descrip);
            $sql->bindValue(5, $tick_fecha);
            $sql->bindValue(6, $tick_hora);
            $sql->bindValue(7, $pri_id);
            $sql->bindValue(8, $tick_cel);
            $sql->bindValue(9, $tick_anydesk);
            $sql->bindValue(10, $sedcat_id);
            $sql->bindValue(11, $tick_empresa);
            $sql->bindValue(12, $tick_solicitud);
            $sql->bindValue(13, $tick_usuafect);
            $sql->execute();

            $sql1="select last_insert_id() as 'tick_id';";
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();
            return $resultado=$sql1->fetchAll(pdo::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        }

        public function listar_ticket_x_usu($usu_id){
            try{
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_ticket.tick_id,
                tm_ticket.usu_id,
                tm_ticket.cat_id,
                tm_ticket.tick_titulo,
                tm_ticket.tick_descrip,
                tm_ticket.tick_estado,
                tm_ticket.fech_crea,
                tm_ticket.usu_asig,
                tm_ticket.fech_asig,
                tm_ticket.tick_cel,
                tm_ticket.tick_anydesk,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_categoria.cat_nom,
                tm_ticket.hora,
                tm_ticket.fech_cierre,
                tm_ticket.pri_id,
                tm_sede.sedcat_nom,
                tm_prioridad.pri_nom,
                tm_ticket.tick_solicitud,
                tm_ticket.tick_usuafect
                FROM 
                tm_ticket
                INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                INNER join tm_prioridad on tm_ticket.pri_id = tm_prioridad.pri_id
                LEFT JOIN tm_sede on tm_sede.sedcat_id=tm_ticket.sedcat_id
                WHERE
                tm_ticket.est = 1
                AND tm_usuario.usu_id=?
                order by tm_ticket.tick_id desc
                ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }

        public function listar_ticket_x_id($tick_id){
            try {
                            
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_ticket.fech_cierre,
            tm_ticket.tick_cel,
            tm_ticket.tick_anydesk,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_usuario.usu_correo,
            tm_ticket.pri_id,
            tm_prioridad.pri_nom,
            tm_sede.sedcat_nom,
            tm_categoria.cat_nom,
            tcd.tickd_descrip,
            tm_ticket.tick_solicitud,
            tm_ticket.tick_usuafect
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            INNER join tm_prioridad on tm_ticket.pri_id = tm_prioridad.pri_id
            LEFT JOIN tm_sede on tm_sede.sedcat_id=tm_ticket.sedcat_id
            LEFT JOIN td_ticketdetalle tcd ON tcd.tick_id=tm_ticket.tick_id
            WHERE
            tm_ticket.est = 1
            AND tm_ticket.tick_id = ?
            order by tm_ticket.tick_id desc;
                ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        }

        public function listar_ticket(){
            try{
                $conectar= parent::conexion();
                parent::set_names();
                $sql="SELECT
                    tm_ticket.tick_id,
                    tm_ticket.usu_id,
                    tm_ticket.cat_id,
                    tm_ticket.tick_titulo,
                    tm_ticket.tick_descrip,
                    tm_ticket.tick_estado,
                    tm_ticket.fech_crea,
                    tm_ticket.fech_cierre,
                    tm_ticket.usu_asig,
                    tm_ticket.fech_asig,
                    tm_ticket.tick_cel,
                    tm_ticket.tick_anydesk,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape,
                    tm_categoria.cat_nom,
                    tm_ticket.pri_id,
                    tm_prioridad.pri_nom,
                    tm_sede.sedcat_nom,
                    tm_ticket.hora,
                    tm_ticket.tick_solicitud,
                    tm_ticket.tick_usuafect
                    FROM 
                    tm_ticket
                    INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                    INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                    INNER join tm_prioridad on tm_ticket.pri_id = tm_prioridad.pri_id
                    LEFT JOIN tm_sede on tm_sede.sedcat_id=tm_ticket.sedcat_id
                    WHERE
                    tm_ticket.est = 1                    
                    order by tm_ticket.tick_id desc
                    limit 50
                    ";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();}
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }

        public function listar_ticket_2(){
            try{
                $conectar= parent::conexion();
                parent::set_names();
                $sql="SELECT
                    tm_ticket.tick_id,
                    tm_ticket.usu_id,
                    tm_ticket.cat_id,
                    tm_ticket.tick_titulo,
                    tm_ticket.tick_descrip,
                    tm_ticket.tick_estado,
                    tm_ticket.fech_crea,
                    tm_ticket.fech_cierre,
                    tm_ticket.usu_asig,
                    tm_ticket.fech_asig,
                    tm_ticket.tick_cel,
                    tm_ticket.tick_anydesk,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_ape,
                    tm_categoria.cat_nom,
                    tm_ticket.pri_id,
                    tm_prioridad.pri_nom,
                    tm_sede.sedcat_nom,
                    tm_ticket.hora,
                    tm_ticket.tick_solicitud,
                    tm_ticket.tick_usuafect
                    FROM 
                    tm_ticket
                    INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                    INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                    INNER join tm_prioridad on tm_ticket.pri_id = tm_prioridad.pri_id
                    LEFT JOIN tm_sede on tm_sede.sedcat_id=tm_ticket.sedcat_id
                    WHERE
                    tm_ticket.est = 1                    
                    order by tm_ticket.tick_id desc
                    limit 20
                    ";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();}
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }

        public function listar_ticketdetalle_x_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT td_ticketdetalle.tick_id,
            td_ticketdetalle.tickd_id, 
            td_ticketdetalle.tickd_descrip,
            td_ticketdetalle.fech_crea, 
            tm_usuario.usu_nom, tm_usuario.usu_ape, 
            tm_sede.sedcat_nom, tm_usuario.rol_id , 
            td_documento.doc_nom 
            FROM td_ticketdetalle 
            INNER join tm_usuario on td_ticketdetalle.usu_id = tm_usuario.usu_id 
            INNER JOIN tm_ticket on tm_ticket.tick_id=td_ticketdetalle.tick_id 
            LEFT JOIN tm_sede on tm_sede.sedcat_id=tm_ticket.sedcat_id 
            LEFT JOIN td_documento on td_documento.tick_id=tm_ticket.tick_id 
            WHERE td_ticketdetalle.tick_id =?;
            ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle($tick_id,$usu_id,$tickd_descrip){
            $conectar= parent::conexion();
            parent::set_names();
                $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) VALUES (NULL,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->bindValue(3, $tickd_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle_cerrar($tick_id,$usu_id){
            $conectar= parent::conexion();
            parent::set_names();
                $sql="call sp_i_ticketdetalle_01(?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle_reabrir($tick_id,$usu_id){
            $conectar= parent::conexion();
            parent::set_names();
                $sql="	INSERT INTO td_ticketdetalle 
                    (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) 
                    VALUES 
                    (NULL,?,?,'Ticket Re-Abierto...',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket 
                set	
                    tick_estado = 'Cerrado',
                    fech_cierre = now()
                where
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function reabrir_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket 
                set	
                    tick_estado = 'Abierto'
                where
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_ticket_asignacion($tick_id,$usu_asig){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket 
                set	
                    usu_asig = ?,
                    fech_asig = now()
                where
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_asig);
            $sql->bindValue(2, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_total(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_totalabierto(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where tick_estado='Abierto'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_totalcerrado(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where tick_estado='Cerrado'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function get_ticket_grafico(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
                FROM   tm_ticket  JOIN  
                    tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
                WHERE    
                tm_ticket.est = 1
                GROUP BY 
                tm_categoria.cat_nom 
                ORDER BY total DESC";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function update_ticket_estado($tick_id,$tick_estado){
            var_dump($tick_id);
            var_dump($tick_estado);    
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket 
                set	tick_estado = ?
                where tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_estado);
            $sql->bindValue(2, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
    }
?>