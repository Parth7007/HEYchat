
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Cover Template · Bootstrap v5.0</title>

    <link href="css/index.css" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">HEYchat</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end" id="nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="about.html">About</a>
        <a class="nav-link" href="contact.html">Contact</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
    <h1>HEYchat</h1>
    <p class="lead">Get Connect with the World !</p>
    <p class="lead"></p>

    <form class="input" action="index.php" method="post">
      <h1>heychat.com/</h1><input type="text" name="room"><br><br>

      <input type="submit">
    </form>

  </main>

  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
    <h1>PROJECT DEVELOPED AND CREATED BY:- PARTH KADOO</h1>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>


<?php
    // $room = $_POST["room"];
    $room = isset($_POST["room"]) ? $_POST["room"] : "";



    if (strlen($room)>20 or strlen($room)<2) {
        $message = "Please chooese a name between 2 to 20 characters";
        echo '<script>alert("$message   ")</script>'; 
    }

    elseif (!ctype_alnum($room)) {
        $message = "please choose alphanumeric name"; 
        echo '<script>alert("$message")</script>';
    }


    else{
        include 'db_connect.php';  
        
        
    }

    $sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";

    $result = mysqli_query($con, $sql);

    if($result){
        if (mysqli_num_rows($result) > 0) {
            # code...
            $message = "Please choose a different room name";
            echo '<script language = "javascript">';
            echo 'alert("'.$message.'");';
            echo '</script>';
        }

        else {
            $sql = "INSERT INTO `rooms` (`sno.`, `roomname`, `stime`) VALUES ('','$room', current_timestamp());";
            if (mysqli_query($con, $sql)) {
                # code...
                $message = "Your room is ready";
                echo '<script language = "javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location = "http://localhost/chatroom/rooms.php?roomname=' . $room .'"; ';

                echo '</script>';
            }
        }

    }

    
?>