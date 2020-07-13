<?php
   session_start();
   // require_once('../includes/connection.php');
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
      $sql = "SELECT `usr_email`,`usr_password` FROM `tbl_users` WHERE `usr_email` = '${usrEmail}';";
      $result = $connection->query($sql);
      $row = $result->num_rows;
      if($row == 1){
         $data = $result->fetch_assoc();
         $usrPassword = $_POST['usrPassword'];
         $hashedPassword = $data['usrPassword'];
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
         else{
            echo "<div class='mt-5 container container-fluid'>
              <div class='alert alert-danger center'>Login Failed, Double check your Password</div>
            </div>";
         }
      }
      else
         echo "<div class='mt-5 container container-fluid'>
            <div class='alert alert-danger center'>User with '${usrEmail}' doesn't Exist</div>
         </div>";
   }
?>