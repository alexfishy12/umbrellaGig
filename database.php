<?php
   // connect to mongodb
   $m = new MongoClient();
	
   echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;
	
   echo "Database mydb selected";

   
   $Venue = $db->createCollection("Venue");
   $Entertainer = $db->createCollection("Entertainer");
   echo "Collection created succsessfully";

       
      $venue1 = array( 
         "vID" => "123xc", 
         "email" => "123xc@gmail.com", 
         "name" => "Concert",
         "type" => " ",
         "booking price" => "125",
         "ref" => $entertainer1,//not sure how to make reference with PHP 
         //url:https://www.mongodb.com/docs/manual/reference/database-references/
         "location" => "New York"

      );

      $entertainer1 = array( 
        "eID" => "xc", 
        "email" => "xc@gmail.com", 
        "name" => "Jon"

     );
       
      $Entertainer->insert($entertainer1);
      echo "entertainer1 inserted successfully";
      $Venue->insert($venue1);
      echo "venue1 inserted successfully";
?>