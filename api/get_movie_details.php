<?php
require '../db/config.php';
$ID = $_GET['ID'];

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM movies WHERE id = $ID");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    if( $Data = $resultat->fetch() ) 
    {
        $myObj = new \stdClass();

       $myObj->id = $Data->id;
       $myObj->name = $Data->name;
       $myObj->release_date = $Data->release_date;
       $myObj->runtime = $Data->runtime;
       $myObj->genres = $Data->genres;
       $myObj->poster = $Data->poster;
       $myObj->banner = $Data->banner;
       $myObj->youtube_trailer = $Data->youtube_trailer;
       $myObj->downloadable = $Data->downloadable;
       $myObj->type = $Data->type;
       $myObj->status = $Data->status;
       $myObj->description = $Data->description;

       $myJSON = json_encode($myObj, JSON_UNESCAPED_SLASHES);

       echo $myJSON;
    } else {
        echo "No Data Avaliable";
    }


?>