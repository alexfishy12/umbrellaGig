<?php
   include "dbconfig.php";
   
   //get form data
   $username   = $_POST['username'];
   $password   = $_POST['password'];
   $email      = $_POST['email'];
   $firstName  = $_POST['firstName'];
   $lastName   = $_POST['lastName'];
   $phone      = $_POST['phone'];
   $city       = $_POST['city'];
   $street     = $_POST['street'];
   $state      = $_POST['state'];
   $zipcode    = $_POST['zipcode'];
   $type       = $_POST['type'];

   //mongo variable is connection to mongo server
   //gigMe variable is gigMe database
   $gigMe = $mongo->gigMe;
   //Customers variable is Customers collection
   $Customers = $gigMe->Customers;

   //insert document into Customers collection
   $insertDocument = $Customers->insertOne([
      'username' => $username,
      'password' => $password,
      'email' => $email,
      'firstName' => $firstName,
      'lastName' => $lastName,
      'phone' => $phone,
      'city' => $city,
      'street' => $street,
      'state' => $state,
      'zipcode' => $zipcode,
      'type' => $type,
   ]);

   printf("Inserted %d document(s)\n", $insertDocument->getInsertedCount());
?>