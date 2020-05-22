<?php 
   class Postagem {
       public static function listaPlanetas(){
         $con = Banco::getInstance();
        $sql="SELECT * FROM planetas ";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        while ($row=$sql->fetchObject('postagem')) {
            $resultado[] = $row;
          }
          if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro");
          }
          return $resultado;
    }

    public static function PlanetasId($idpost){
      $con = Banco::getInstance();
      $sql="SELECT  * FROM planetas WHERE idplanetas = :id ";
           $sql=$con->prepare($sql);
           $sql->bindParam(':id',$idpost,PDO::PARAM_INT);
           $sql->execute();

           $resultado = $sql->fetchObject('postagem');

           if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro");
            //return false;
          }else{
            $resultado->comentario = Comentario::comentarioId($resultado->idplanetas);
          }
          return $resultado;
    }

    public static function addPlaneta($dadosPlanetas){
      if(empty($dadosPlanetas['nome']) or empty($dadosPlanetas['descricao'])){
        throw new Exception("Preencha todos os campos");
        return false;
      }
      $con = Banco::getInstance();
      $sql="INSERT INTO planetas (nome,descobridor,ano,descricao) VALUES (:n,:de,:a,:descr)";
           $sql=$con->prepare($sql);
           $sql->bindValue(':n',$dadosPlanetas['nome']);
           $sql->bindValue(':de',$dadosPlanetas['descobridor']);
           $sql->bindValue(':a',$dadosPlanetas['ano'],PDO::PARAM_INT);
           $sql->bindValue(':descr',$dadosPlanetas['descricao']);

           $res = $sql->execute();
           if($res == 0){
            throw new Exception("Falha ao inserir publicação");
            return false;
          }
          return true;
        }

        public static function updatePlaneta($params){
          $con =Banco::getInstance();
          $sql = "UPDATE planetas SET nome = :nome,descobridor = :de,ano = :ano,descricao = :descr WHERE idplanetas =:id ";
          $sql = $con->prepare($sql);
          $sql->bindValue(':nome',$params['nome']);
          $sql->bindValue(':de',$params['descobridor']);
          $sql->bindValue(':ano',$params['ano']);
          $sql->bindValue(':descr',$params['descricao']);
          $sql->bindValue(':id',$params['idplanetas']);

          $resultado = $sql->execute();
          if($resultado == 0){
            throw new Exception("Falha ao Alterar publicação");
            return false;
          }
          return true;
        }

        public static function deletePlanetas($id){
          $con =Banco::getInstance();
          $sql = "DELETE FROM planetas WHERE idplanetas =:id ";
          $sql = $con->prepare($sql);
          $sql -> bindValue(':id',$id,PDO::PARAM_INT);
          $resultado = $sql->execute();

          if($resultado == 0){
            throw new Exception("Falha ao Excluir publicação");
            return false;
          }
          return true;
        }
    
       }
   
?>