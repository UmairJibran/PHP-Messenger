<?php
   session_start();
   require_once('../includes/connection.php');
   $error = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/master.css">
</head>
<body>
   <div class="container container-fluid">
      <div class="row mt-5">
         <aside class="float-left col col-6">
            <h3 class="center">Sign Up</h3>
            <form method="post">
               <div class="row">
                  <div class="form-group mt-3 col-md-6">
                     <label for="sfname">First Name</label>
                     <input type="text" id="sfname" name="usrFirstName" required class="form-control" placeholder="John">
                  </div>
                  <div class="form-group mt-3 col-md-6">
                     <label for="slname">Last Name</label>
                     <input type="text" id="slname" name="usrLastName" required class="form-control" placeholder="Doe">
                  </div>
               </div>
               <div class="form-group mt-3">
                  <label for="semail">Email</label>
                  <input type="email" id="semail" name="usrEmail" required class="form-control" placeholder="you@organization.com">
               </div>
               <div class="form-group mt-3">
                  <label for="spassword">Password</label>
                  <input type="password" id="spassword" name="usrPassword" required class="form-control" placeholder="•••••••••••••••••">
               </div>
               <input type="submit" value="Sign Up" name="signup" class="btn btn-outline-info float-right mt-2">
            </form>
         </aside>
         <section class="col"></section>
         <aside class="float-right col col-3">
            <h3 class="center">Log In</h3>
            <form method="post">
               <div class="form-group mt-3">
                  <label for="lemail">Email</label>
                  <input type="email" id="lemail" name="usrEmail" required class="form-control" placeholder="you@organization.com">
               </div>
               <div class="form-group mt-3">
                  <label for="lpassword">Password</label>
                  <input type="password" id="lpassword" name="usrPassword" required class="form-control" placeholder="•••••••••••••••••">
               </div>
               <input type="submit" value="Login" name="login" class="btn btn-outline-info float-right mt-2">
            </form>
         </aside>
      </div>
   </div>
</body>
</html>

<?php
   if(isset($_POST['login'])){
      $usrEmail = $_POST['usrEmail'];
      $sql = "SELECT * FROM `tbl_users` WHERE `usr_email` = '${usrEmail}';";
      $result = $connection->query($sql);
      $row = $result->num_rows;
      if($row == 1){
         $data = $result->fetch_assoc();
         $usrPassword = $_POST['usrPassword'];
         $hashedPassword = $data['usr_password'];         
         if(password_verify($usrPassword, $hashedPassword)){
            $user = [
               'id' => $data['usr_id'],
               'firstName' => $data['usr_first_name'],
               'lastName' => $data['usr_last_name'],
               'email' => $data['usr_email'],
            ];
            $_SESSION['user'] = $user;
            header("Location:../");
         }
         else $error = "Login Failed, Double check your Password";
      }
      else $error = "User with '${usrEmail}' doesn't Exist";
   }
   if(isset($_POST['signup'])){
      $usrEmail = $_POST['usrEmail'];
      $firstName = $_POST['usrFirstName'];
      $lastName = $_POST['usrLastName'];
      $inputPassword = $_POST['usrPassword'];
      $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `tbl_users` (`usr_id`, `usr_first_name`, `usr_last_name`, `usr_email`, `usr_password`) VALUES (NULL, '${firstName}', '${lastName}', '${usrEmail}', '${hashedPassword}')";
      if($connection->query($sql) === true){
         $user = [
            'id' => $connection->insert_id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $usrEmail,
         ];
         $_SESSION['user'] = $user;
      }else $error = $connection->error;
   }
   if($error){
      echo "<div class='mt-5 container container-fluid'>
         <div class='alert alert-danger center'>$error</div>
      </div>";
   }
?>