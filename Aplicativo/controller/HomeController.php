<?php
   class HomeController{
       public function index(){
           try{
            $planetas = Postagem::listaPlanetas();
            $loader = new \Twig\Loader\FilesystemLoader('Aplicativo/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');
            
            $parametros = array();
            $parametros['planetas'] = $planetas;

            $conteudo= $template->render($parametros);

            echo $conteudo;

        }catch(Exception $e){
            echo $e->getMessage();
        }
       }
   } 
?>