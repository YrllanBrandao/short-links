<?php
    namespace App\Controllers;

    use MF\Controller\Action;

    class IndexController extends Action{
        public function index(){
            $this -> render('index');
        }
        public function shortLink(){
            $json_data = file_get_contents('php://input');
            
            // Decodifica o JSON para um array associativo
            $data = json_decode($json_data, true);
        
            if ($data === null) {
                // Erro ao decodificar JSON
                http_response_code(400); // Status 400 Bad Request
                $error_message = array("erro" => "Formato JSON inválido");
                echo json_encode($error_message);
                return;
            }
            $longLink = $data['longLink'];
        
            header("Content-Type: application/json");
            http_response_code(200);
            
            $response_data = [
                'shortened_link' => $longLink
            ];
            $encoded_response = json_encode($response_data);
        
            echo $encoded_response;
        }
        
    }