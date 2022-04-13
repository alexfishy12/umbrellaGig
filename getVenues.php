<?php
    include "dbconfig.php";
    //check if search parameters are set
    //if(isset($_POST['']))

    //mongo variable is connection to mongo server
    //gigMe variable is gigMe database
    $gigMe = $mongo->gigMe;
    //Customers variable is Customers collection
    $Venues = $gigMe->Venues;

    $result = $Venues->find();

    $venuesArray = array();
    foreach($result as $venue)
    {
        $venuesArray[] = $venue;
    }

    echo json_encode($venuesArray);
?>