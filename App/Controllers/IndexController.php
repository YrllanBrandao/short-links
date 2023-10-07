<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use App\Models\UrlModel;
    class IndexController extends Action{
        public function index(){
            $this -> render('index');
        }
        public function shortLink(){
            $urlModel = new UrlModel;


           
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $url_response = $urlModel -> genShortenedUrl($data['longLink']);
        
           if($url_response['success']  === true){

            if ($data === null) {
                http_response_code(400);
                $error_message = array("erro" => "Formato JSON inválido");
                echo json_encode($error_message);
                return;
            }


            header("Content-Type: application/json");
            http_response_code(200);
            
            $response_data = [
                'shortened_link' => $url_response['shortened_url']
            ];
            $encoded_response = json_encode($response_data);
            
            echo $encoded_response;
            exit;
           }
           else{
            header("Content-Type: application/json");
            http_response_code(400);
            echo 'Ocorreu um erro';
           }
        }



        
    }