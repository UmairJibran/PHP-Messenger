<?php
   $username = "root";
   $password = "";
   $server = "localhost";
   $database = "php-messenger";

   $connection = new mysqli($server, $username, $password, $database);
   // Check connection
   if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
   }
?>