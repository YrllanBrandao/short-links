<?php 
    namespace App\Routes;

    use App\Routes\AbstractRoute;
    use App\Models\UrlModel;
    class IndexRoute extends AbstractRoute{
        private $routes;

        public function setRoutes(){
            $urlModel = new UrlModel;

            $routes['index'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            $routes['short'] = [
                'route' => '/short-url',
                'controller' => 'indexController',
                'action' => 'shortLink'
            ];
            
          $savedPaths =   $urlModel -> getSavedPaths();
           
          if($savedPaths['route' !== '/404'])
            foreach($savedPaths as $paths){
                $routes[$paths['path']] = [
                    'route' => '/' . $paths['path'],
                    'controller' => 'indexController',
                    'action' => 'redirectTo("' . $paths['longUrl'] . '")'
                ];
            }

            $this -> routes = $routes;
        }

        public function getRoutes(){
          
            return $this -> routes;
        }
    }


