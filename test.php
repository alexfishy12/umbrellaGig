<?php
    include "dbconfig.php";

    $venues = $mongo->gigMe->Venues;

    $result = $venues->find()->toArray();
    print_r($result);

    foreach ($result as $venue)
    {
        echo $venue->name;
        echo "<br>";
    }
?>