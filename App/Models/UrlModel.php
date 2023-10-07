<?php 
    namespace App\Models;
    use App\Database\Connection;
    use \PDO;
    use \PDOException;
    class UrlModel{
        private function genPath(){
            $alphabet = 'abcdefghijklmnopqrstuwvxyz';
            $path = '';

           do{
            for($i = 0; $i < 4; $i++){
                $path .= $alphabet[rand(0, 25)];
            }
            $path_exists = $this -> checkIfPathExists($path);
           }
           while($path_exists);
           return $path;
        }
        public function genShortenedUrl($long_url){

            $base_url = 'http://localhost/';
            $generatedPath =  $this -> genPath();
            $shortened_url = $base_url . $generatedPath;
            $response = [
                'success' => $this -> saveUrl($long_url, $generatedPath),
                'shortened_url' => $shortened_url
                
            ];
            return $response;
        }
        private function saveUrl($long_url, $path){
            try{
                $conn = new Connection;

            $connection = $conn -> getConnection();
            $sql = '
            INSERT INTO savedUrls(longUrl, path) VALUES(:longUrl, :path)
            ';

            $statement = $connection -> prepare($sql);

            $statement -> bindParam(":longUrl", $long_url);
            $statement -> bindParam(":path", $path);

            $statement -> execute();
        
            return true;
            }
            catch(PDOException $error)
            {
                return false;
            }
        }
        private function checkIfPathExists($path){
            $conn = new Connection;

            $connection = $conn -> getConnection();

            $sql = '
                select * from  savedUrls WHERE path = :path
            ';
            $statement = $connection -> prepare($sql);

            $statement -> bindParam(':path', $path);

            $statement -> execute();

            $result = $statement -> fetch(PDO::FETCH_ASSOC);

            if(empty($result)){
                return false;
            }
            return true;
        }

        public function getSavedPaths(){
            $conn = new Connection;

            $connection = $conn -> getConnection();

            $sql = '
                select path, longUrl from  savedUrls 
            ';
            $statement = $connection -> prepare($sql);


            $statement -> execute();

            $result = $statement -> fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                return [
                    'route' => '/404',
                    'controller' => 'indexController',
                    'action' => 'notFound'
                ];
            }
            return $result;
        }
    }