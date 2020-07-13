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
         <small class="float-left">Welcome, Jane Doe!</small>
         Select a Conversation to continue or <a href="new.php" class="">Start a Conversation</a>
         <a class="float-right btn btn-outline-danger" href="logout.php">Log Out</a>
      </p>
      <br>
      <div class="message-body-preview row">
         <aside class="user-photo col col-1 center">
            <img src="https://via.placeholder.com/150" alt="">
         </aside>
         <aside class="message-preview col col-9">
            <section class="message-sender center">
               <h3>John Doe</h3>
            </section>
            <section class="message left">
               <p>lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet </p>
            </section>
         </aside>
         <aside class="col col-2">
            <a href="#" class="btn btn-outline-primary center">Chat with John</a>
         </aside>
      </div>
   </div>
</body>
</html>