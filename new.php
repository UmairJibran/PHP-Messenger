<?php
   require_once('./includes/auth.php');
   $userID = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Start A Chat</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/master.css">
</head>
<body>
   <div class="container container-fluid">
      <h2 class="center mt-3">Select a Friend to Chat with</h2>
      <a href="./" class="btn btn-outline-primary float-left">Home</a>
      <a href="logout.php" class="btn btn-outline-danger float-right">Log Out</a>
      <br><br>
      <form method="post" class="row">
         <select name="user" required class="form-control mt-4">
            <option selected disabled>Select your buddy</option>
            <?php
               $sql = "SELECT * FROM `tbl_users`";
               $result = $connection->query($sql);
               $row = $result->num_rows;
               if($row>0){
                  while($data = $result->fetch_assoc()){
                     $newUserID = $data['usr_id'];
                     $newUserEmail = $data['usr_email'];
                     $newUserName = $data['usr_first_name'] . " " . $data['usr_last_name'];
                     $sql1 = "SELECT *  FROM `tbl_convo` WHERE
                        (`msg_participant1` = $userID OR `msg_participant2` = $userID)
                        AND (`msg_participant1` = $newUserID OR `msg_participant2` = $newUserID);
                     ";
                     $result1 = $connection->query($sql1);
                     $row1 = $result1->num_rows;
                     if($row1 <= 0)
                        echo "<option value='${newUserID}'>$newUserName | $newUserEmail</option>";
                  }
               }
            ?>
         </select>
         <div class="col col-11">
            <input type="text" name="message" required class="mt-2 form-control" placeholder="start typing, here...">
         </div>
         <div class="col col-1"><input type="submit" value="Send" name="send" class="mt-2 btn btn-primary"></div>
      </form>
   </div>
</body>
</html>