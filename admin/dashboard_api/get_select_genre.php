<?php
require '../../db/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM genres");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $json =array();
    while( $Data = $resultat->fetch() ) 
    {
        $json[] = array("id"=>$Data->id, "text"=>$Data->name);
    }

    echo json_encode($json, JSON_UNESCAPED_SLASHES);
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}

?>