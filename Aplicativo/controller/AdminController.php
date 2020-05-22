<?php
   class AdminController{
       public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('Aplicativo/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $planetas = Postagem::listaPlanetas();

            
            $parametros = array();
            $parametros['planetas'] = $planetas;

            $conteudo= $template->render($parametros);

            echo $conteudo;
       }

       public function adicionarplanetas(){
        $loader = new \Twig\Loader\FilesystemLoader('Aplicativo/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('adicionar.html');

        $parametros = array();
        $conteudo = $template->render($parametros);

        echo $conteudo;

       }

       public function insert(){
           try{
           $planetas = Postagem::addPlaneta($_POST);

           echo "<script>alert('Planeta ".$_POST["nome"]." inserido com sucesso');</script>";
           echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=index"</script>';
           }catch(Exception $e){
               echo '<script>alert("'.$e->getMessage().'");</script>';
               echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=adicionarplanetas"</script>';

           }
       }

       public function alterarPlanetas($paramsId){
        $planetas = Postagem::PlanetasId($paramsId);

        $loader = new \Twig\Loader\FilesystemLoader('Aplicativo/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('alterar.html');

        $parametros = array();
        $parametros['idplanetas'] = $planetas->idplanetas;
        $parametros['nome'] = $planetas->nome;
        $parametros['descobridor'] = $planetas->descobridor;
        $parametros['ano'] = $planetas->ano;
        $parametros['descricao'] = $planetas->descricao;

        $conteudo = $template->render($parametros);

        echo $conteudo;
       }

       public function update(){
           try{
            Postagem::updatePlaneta($_POST);

            echo "<script>alert('Planeta ".$_POST["nome"]." atualizado com sucesso');</script>";
            echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=index"</script>';
           }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=alterarPlanetas&idplanetas='.$_POST['idplanetas'].'"</script>';
           }
       }

       public function deletePlaneta($paramId){
           try{
               Postagem::deletePlanetas($paramId);

               echo "<script>alert('Planeta excluido com sucesso');</script>";
               echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=index"</script>';
           }catch(Exception $e){
               echo "<script>alert('".$e->getMessage()."');</script>";
               echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=admin&metodo=index"</script>';
           }
       }
   } 
?>