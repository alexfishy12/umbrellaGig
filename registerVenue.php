<?php
   include "dbconfig.php";
   
   //get form data
   $username        = $_POST['username'];
   $password        = $_POST['password'];
   $email           = $_POST['email'];
   $businessName    = $_POST['businessName'];
   $phone           = $_POST['phone'];
   $street          = $_POST['street'];
   $city            = $_POST['city'];
   $state           = $_POST['state'];
   $zipcode         = $_POST['zipcode'];
   $type            = $_POST['type'];
   $priceRange      = $_POST['priceRange'];

   //mongo variable is connection to mongo server
   //gigMe variable is gigMe database
   $gigMe = $mongo->gigMe;
   //Customers variable is Customers collection
   $Venues = $gigMe->Venues;

   //insert document into Customers collection
   $insertDocument = $Venues->insertOne([
      'username'        => $username,
      'password'        => $password,
      'email'           => $email,
      'businessName'    => $businessName,
      'phone'           => $phone,
      'street'          => $street,
      'city'            => $city,
      'state'           => $state,
      'zipcode'         => $zipcode,
      'type'            => $type,
      'priceRange'      => $priceRange,
      'bio'             => "",
   ]);

   printf("Inserted %d document(s)\n", $insertDocument->getInsertedCount());
?>