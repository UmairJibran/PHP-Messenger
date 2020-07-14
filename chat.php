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
</head>
<body>
   
</body>
</html>