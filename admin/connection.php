<?php
   // For MySQL connection

    //$server_name="localhost";
    //$user_name="u514565212_alpha";
	//$password="Singh#640";
	//$db_name="u514565212_ztesting";

    //Local Databae Override
    $server_name="localhost";
    $user_name="root";
    $password="";
    $db_name="barber";


	$db=new mysqli($server_name,$user_name,$password,$db_name);
    //if(!$db) {
      //  echo "Error : Unable to open database\n";
     //} 
    //else {
    //     echo "Opened database successfully\n";
    // }
?>