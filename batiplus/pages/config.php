<?php

$dbHost = "localhost";
   $dbName = "batiplus";
    $dbUser = "root";
   $dbUserPassword ="";
   try 
        {
        $connection = new PDO("mysql:host=".$dbHost. ";dbname=" .$dbName,$dbUser,$dbUserPassword);
        } 
            catch (PDOException $e) 
        {
          die($e->getMessage());  
        }










?>






















<!-- ?php

class Database

{
   private static $dbHost = "localhost";
   private static $dbName = "batiplus";
   private static $dbUser = "root";
   private static $dbUserPassword ="";
   
   private static $connection = null;
    
   public static function connect() 
    {
        try 
        {
           self::$connection = new PDO("mysql:host=".self::$dbHost. ";dbname=" .self::$dbName,self::$dbUser,self::$dbUserPassword);
        } 
        catch (PDOException $e) 
        {
          die($e->getMessage());  
        }
           return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }
}

    Database::connect();
   

?> -->
