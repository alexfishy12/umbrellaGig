<?php
   include "dbconfig.php";
   
   //get form data
   $username   = $_POST['username'];
   $password   = $_POST['password'];
   $email      = $_POST['email'];
   $firstName  = $_POST['firstName'];
   $lastName   = $_POST['lastName'];
   $phone      = $_POST['phone'];
   $street     = $_POST['street'];
   $city       = $_POST['city'];
   $state      = $_POST['state'];
   $zipcode    = $_POST['zipcode'];
   $type       = $_POST['type'];

   //mongo variable is connection to mongo server
   //gigMe variable is gigMe database
   $gigMe = $mongo->gigMe;
   //Customers variable is Customers collection
   $Entertainers = $gigMe->Entertainers;

   //insert document into Customers collection
   $insertDocument = $Entertainers->insertOne([
      'username' => $username,
      'password' => $password,
      'email' => $email,
      'firstName' => $firstName,
      'lastName' => $lastName,
      'phone' => $phone,
      'street' => $street,
      'city' => $city,
      'state' => $state,
      'zipcode' => $zipcode,
      'type' => $type,
      'bio' => "",
   ]);

   printf("Inserted %d document(s)\n", $insertDocument->getInsertedCount());
?>