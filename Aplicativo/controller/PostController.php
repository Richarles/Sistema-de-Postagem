<?php 
class PlanetaController{
    public function index($params){
        try{
            $planeta = Postagem::PlanetasId($params);

            $loader = new \Twig\Loader\FilesystemLoader('Aplicativo/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('post.html');

            $parametros = array();
            $parametros['idplanetas'] = $planeta->idplanetas;
            $parametros['nome'] = $planeta->nome;
            $parametros['descobridor'] = $planeta->descobridor;
            $parametros['ano'] = $planeta->ano;
            $parametros['descricao'] = $planeta->descricao;
            $parametros['comentarios'] = $planeta->comentario;
            $conteudo = $template->render($parametros);

            echo $conteudo;


        }catch(Exception $e){
            echo $e->getMessage();
            
        }
    }

    public function addComentario(){
        try{
            Comentario::insertComentario($_POST);
            header('location:http://localhost/projetos_php//MVC_php/?pagina=planeta&idplanetas='.$_POST['idplanetas']);
        }catch(Exception $e){
            echo $e->getMessage();
            echo '<script>location.href="http://localhost/projetos_php//MVC_php/?pagina=planeta&idplanetas='.$_POST['idcomentarios'].'"<script>';
        }
    }
}
?>