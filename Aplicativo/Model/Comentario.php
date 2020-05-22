<?php 
   class Comentario{
       public static function comentarioId($idPost){
        $con = Banco::getInstance();
         $sql = "SELECT * FrOM comentario WHERE idplanetas =:id";
           $sql = $con->prepare($sql);
           $sql->bindValue(':id',$idPost,PDO::PARAM_INT);
           $sql->execute();

           $resultado = array();

           while ($row=$sql->fetchObject('Comentario')) {
               $resultado[] = $row;
           }
           return $resultado;
       }

       public static function insertComentario($reqPost){
        $con = Banco::getInstance();
        $sql = "INSERT INTO comentario (nome,comentario,idplanetas) VALUES (:nom,:com,:idp)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':nom',$reqPost['nome']);
        $sql->bindValue(':com',$reqPost['comentario']);
        $sql->bindValue(':idp',$reqPost['idplanetas']);
        $sql->execute();

        if($sql->rowCount()){
            return true;
        }
        throw new Exception("Falha na inserção");
       }
    }
   
?>