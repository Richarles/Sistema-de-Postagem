<?php 
  require_once "config.php";

   abstract class Banco{
       public static $instance;
       public static function getInstance(){
           if(!isset(self::$instance)){
               try{
                   self::$instance = new PDO('mysql:host='.DB_host.';dbname='.DB_name,DB_user,DB_pass);
                   self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                   self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
             }catch(PDOException $e){
                 echo "errroooo".$e->getMessage();
             }
         }
         return self::$instance;
     }
     public static function prepare($sql){
         return self::getInstance()->prepare($sql);
     }
               }
  ?>
