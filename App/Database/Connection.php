<?php 
    namespace App\Database;

    use \PDO;
    use \PDO\PDOException;
    use \Dotenv\Dotenv;
    class Connection{
        private $connection;
        public function __construct(){
            $this -> setConnection();
        }
        public function setConnection(){

            $dotenv_path = dirname(__DIR__);
            
            $dotenv = Dotenv::createImmutable($dotenv_path);
            $dotenv -> load();
        
            $connection = new PDO($_ENV['DATABASE_DSN'],$_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD']);

            $this -> connection = $connection;
        }

        public function getConnection(){
            return $this -> connection;
        }
    }