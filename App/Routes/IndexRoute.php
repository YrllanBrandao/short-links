<?php 
    namespace App\Routes;

    use App\Routes\AbstractRoute;

    class IndexRoute extends AbstractRoute{
        private $routes;

        public function setRoutes(){
            $routes['index'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            
            $this -> routes = $routes;
        }

        public function getRoutes(){
          
            return $this -> routes;
        }
    }


