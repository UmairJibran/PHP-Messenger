<?php
   require_once('./includes/auth.php');
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
      <div class="message-body recepient">
            lol
         </div>
         <div class="message-body sender">
            lol
         </div>         
      </section>
   </div>
</body>
</html>