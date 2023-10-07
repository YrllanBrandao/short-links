<?php
    namespace App;

    use MF\Init\Bootstrap;
    use App\Routes\IndexRoute;
    class Route extends Bootstrap {

        private static function mergeRoutes(){
            $mergedRoutes = [];
            $args = func_get_args();
            foreach($args as $array){
                $mergedRoutes += $array;
            }
            return $mergedRoutes;
        }
        public function initRoutes(){
           
            $indexRoutes = new IndexRoute;
          
            $routes = self::mergeRoutes(
                $indexRoutes -> getRoutes()
            );
        
            $this -> setRoutes($routes);
        }
    }