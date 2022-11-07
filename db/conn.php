<?php 
//DEVELOPEMENT CONNECTION
  /*  $host = "127.0.0.1";////"applied-web.mysql.database.azure.com";
    $db = "attendancedb";//awoodley_
    $user = "root";////"appliedweb_user@applied-web";
    $pass = "";//"P@ssword1";//
    $charset = "utf8mb4";*/

    $host = "remotemysql.com";
    $db = "N4TuDsQ1Nv";
    $user = "N4TuDsQ1Nv";
    $pass = "2hKoaXIvDB";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn,$user,$pass);
        //echo 'connected to database';
        //$pdo = new PDO("mysql:host =".$host.";dbname= " .$db,$user,$pass);
       //$mysqli = new mysqli("localhost",$user,$pass,$db);
        //echo "<strong>connection successful</strong>";
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //$pdo ->fetchAll(PDO::FETCH_ASSOC); 
        } catch(PDOException $e){
            //echo("Error:".$e->getMessage());
             
            
            
            throw new PDOException($e -> getMessage());
             //echo "<h1 class = 'text-danger'>No database found</h1>";     
           // $mysqli -> select_db($db) or die("unable to connect"); 
       }     
         //$mysqli ->close();
    
       require_once "crud.php";
       $crud = new crud($pdo);
?>