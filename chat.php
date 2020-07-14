<?php
   require_once('./includes/auth.php');
   $userID = $_SESSION['user']['id'];
   $recepientUserID = $_GET['oid'];
   $sql = "SELECT *  FROM `tbl_users` WHERE `usr_id` = '$recepientUserID'";
   $result = $connection->query($sql);
   $recepientData = $result->fetch_assoc();
   $recepientName = $recepientData['usr_first_name'] . " " . $recepientData['usr_last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $recepientName?></title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/master.css">
</head>
<body>
   <div class="container container-fluid">
      <h1 class="center pt-2 pb-2 header fixed-top">Chat with <?php echo $recepientName;?></h1>
      <a href="./" class="float-left btn btn-outline-success">Home</a>
      <a href="logout.php" class="float-right btn btn-outline-danger">Log Out</a>
      <section class="three-quarters">
         <?php
            $sql = "SELECT * FROM `tbl_messages` WHERE
            (`msg_participant1` = '${recepientUserID}' OR `msg_participant2` = '${recepientUserID}')
            AND (`msg_participant1` = '${userID}' OR `msg_participant2` = '${userID}')";
            $result = $connection->query($sql);
            $row = $result->num_rows;
            if($row > 0){
               while($data = $result->fetch_assoc()){
                  $message = $data['msg_body'];
                  if($data['msg_sender'] == $userID){
                     echo "<div class='message-body sender'>$message</div>";
                  }else{
                     echo "<div class='message-body recepient'>$message</div>";
                  }
               }
            }else{
               echo "<div class='center'>There were no messages, why don't you write one</div>";
            }
         ?>
      </section>
      <form method="post" class="row g-3">
         <div class="col-xl-10">
            <input type="text" class="form-control" name="message" placeholder="Type your Message" required>
         </div>
         <div class="col-xl-2">
            <input type="submit" name="send" value="Send" class="btn btn-outline-dark pt-2 pb-2 pr-5 pl-5">
         </div>
      </form>
   </div>
</body>
</html>

<?php
   if(isset($_POST['send'])){
      $messageBody = mysqli_real_escape_string($connection,$_POST['message']);
      $sql = "INSERT INTO `tbl_messages` (`msg_id`, `msg_participant1`, `msg_participant2`, `msg_sender`, `msg_body`)
         VALUES (NULL, '$userID', '$recepientUserID', '$userID', '$messageBody');";
      if($connection->query($sql) === true){
         header("Location: ./chat.php?oid=$recepientUserID");
      }else{
         echo "<div class='alert alert-danger'>$connection->error</div>";
      }
   }
?>