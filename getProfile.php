<?php
    include "dbconfig.php";
    //check if search parameters are set
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
    }
    else
    {
        echo json_encode("Error: ID Post variable undefined.");
    }
    //mongo variable is connection to mongo server
    //gigMe variable is gigMe database
    $gigMe = $mongo->gigMe;
    //Customers variable is Customers collection
    $Entertainers = $gigMe->Entertainers;

    $result = $Entertainers->findOne(array('_id' => new MongoDB\BSON\ObjectID($id)));

    echo json_encode($result);
?>