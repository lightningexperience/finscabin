<?php

function Createdb(){
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);
$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
    
    
  //  $servername = "g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  //  $username = "hdv446tqkzq87cwp";
  //  $password = "gthj9ubjn4smm4o1";
  //  $dbname = "boe5w5nmw6dixoiq";

    // create connection
  //   $con = mysqli_connect($servername, $username, $password);
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
   //  $con = mysqli_connect($servername, $username, $password, $dbname);
        $conn = mysqli_connect($hostname, $username, $password, $database);

        $sql = "
                         CREATE TABLE IF NOT EXISTS leads(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            email VARCHAR (25),
                            last_name VARCHAR (20),
                            first_name VARCHAR (20) 
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
