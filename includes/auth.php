<?php
   session_start();
   if(!isset($_SESSION['user'])){
      header("Location: ./welcome/");
   }
   $user = $_SESSION['user'];
   require_once("./includes/connection.php");
?>