<?php
    include "dbconfig.php";
    //check if search parameters are set
    //if(isset($_POST['']))

    //mongo variable is connection to mongo server
    //gigMe variable is gigMe database
    $gigMe = $mongo->gigMe;
    //Customers variable is Customers collection
    $Entertainers = $gigMe->Entertainers;

    $result = $Entertainers->find();

    $entertainersArray = array();
    foreach($result as $entertainer)
    {
        $entertainersArray[] = $entertainer;
    }

    echo json_encode($entertainersArray);
?>