<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            $host = 'VMAEUClinicosNo';
            $dbname = 'clinicos_helpdesk1';
            $port = '3306';
            $username = 'clinicoshelpdesk2';
            $password = 'nNmMp9XlPKwzynA(';
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=clinicos_helpdesk1","root","");
                //$conectar = $this->dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname",$username,$password);

                //Produccion
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
			return "http://localhost:8073/PERSONAL_HelpDesk/";
			//return "http://20.102.59.40:8814/";          
		}
    }
?>