<?php 
         require_once 'Aplicativo/core/core.php';
         
         require_once 'Aplicativo/controller/HomeController.php';
         require_once 'Aplicativo/controller/PostController.php';
         require_once 'Aplicativo/controller/ErroController.php';
         require_once 'Aplicativo/controller/AdminController.php';

         require_once 'Aplicativo/Model/Postagem.php';
         require_once 'Aplicativo/Model/Comentario.php';


         require_once 'lib/conexao.php';

         require_once 'vendor/autoload.php';

   $template = file_get_contents('Aplicativo/Template/paginaprincipal.html');
   ob_start();
   $core = new Core();
   $core->start($_GET);
   $saida = ob_get_contents();
   ob_end_clean();
   $tpl_Pronto = str_replace('{{area_dinamica}}',$saida,$template);

   echo $tpl_Pronto;
?>