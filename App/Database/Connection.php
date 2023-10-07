<?php 
    namespace App\Database;

    use PDO;
    use PDO\PDOException;
    use Dotenv\Dotenv;
    class Connection{
        private $connection;
        public function __construct(){
            $this -> setConnection();
        }
        public function setConnection(){
            $dotenv_path = dir(__DIR__);
            $dotenv = PDO::create_immutable($dotenv_path);
            $dotenv -> load();
        
            $connection = new PDO($_ENV['DATABASE_DSN'],$_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD']);

            $this -> connection;
        }

        public function getConnection(){
            return $this -> connection;
        }
    }