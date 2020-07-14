<?php
   session_start();
   if(!isset($_SESSION['user'])){
      header("Location: ./welcome/");
   }
   $user = $_SESSION['user'];
   require_once("./includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/master.css">
</head>
<body>
   <h1 class="center">PHP Messenger</h1>
   <div class="container container-fluid">
      <br>
      <p class="center">
         <small class="float-left">Welcome, <?php echo $user['firstName']. " " . $user['lastName'];?>!</small>
         Select a Conversation to continue or <a href="#new.php" class="">Start a Conversation</a>
         <a class="float-right btn btn-outline-danger" href="logout.php">Log Out</a>
      </p>
      <br>
      <div class='message-body-preview row'>
      <?php
         $userID = $user['id'];
         $sql = "SELECT *  FROM `tbl_convo` WHERE `msg_participant1` = '{$userID}' OR `msg_participant2` = '${userID}'";
         $result = $connection->query($sql);
         $row = $result->num_rows;
         if($row > 0){
            while($data = $result->fetch_assoc()){
               $snippet = $data['last_message'];
               $numberOfMessages = $data['total_messages'];
               $otherUserID;
               if($data['msg_participant1'] != $userID){
                  $otherUserID = $data['msg_participant1'];
               }else{
                  $otherUserID = $data['msg_participant2'];
               }
               $query = "SELECT *  FROM `tbl_users` WHERE `usr_id` = '{$otherUserID}'";
               $resultForOtherUser = $connection->query($query);
               $otherUserData = $resultForOtherUser->fetch_assoc();
               $otherUserFirstName = $otherUserData['usr_first_name'];
               $otherUserLastName = $otherUserData['usr_last_name'];
               echo "
                  <aside class='user-photo col-1 center'>
                     <h2 class='display-init'> ". $otherUserFirstName[0] . " " . $otherUserLastName[0] ." </h2>
                  </aside>
                  <aside class='message-preview col-3'>
                     <section class='message-sender center'>
                        <h3>$otherUserFirstName $otherUserLastName <span class='badge bg-dark num-of-messages'>$numberOfMessages</span></h3>
                        <small>$snippet</small>
                     </section>
                  </aside>
                  <aside class='col-2'>
                     <a href='chat.php?oid=$otherUserID' class='btn btn-outline-primary center'>Chat with ${otherUserFirstName}</a>
                  </aside>
               ";
            }
         }else echo "<div class='alert alert-warning center'>No Messages found, Start Messaging</div>";
      ?>         
      </div>
   </div>
</body>
</html>