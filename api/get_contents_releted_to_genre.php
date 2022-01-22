<?php
require '../db/config.php';

$search_term = $_GET['search'];

    $json =array();

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
  
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {

        if (stripos($Data->genres, $search_term) !== false) {
            $json[] = $Data;
        }
       
    }

    $resultat2 = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
    
    $resultat2->setFetchMode(PDO::FETCH_OBJ);
    while( $Data2 = $resultat2->fetch() ) 
    {

        if (stripos($Data2->genres, $search_term) !== false) {
            $json[] = $Data2;
        }
       
    }

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }
    
?>