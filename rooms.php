<?php
    $roomname = $_GET['roomname'];

    include 'db_connect.php'; 

    $sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'";

    $result = mysqli_query($con, $sql);

    if($result){
        if(mysqli_num_rows($result) == 0){
            $message = "This room does not exist";
            echo '<script language = "javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location = "http://localhost/chatroom/index.html";';
            echo '</script>';
        }
    }

    else {
        echo "Error: ". mysqli_error($con);
    }


   

?>

<!DOCTYPE html>
<html>
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

<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.anyclass{
    height: 355px;
    overflow-y: scroll;
}
</style>
</head>
<body>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">HEYchat</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
        <a class="nav-link" href="about.html">About</a>
        <a class="nav-link" href="contact.html">Contact</a>
      </nav>
    </div>
  </header>

<h2>Chat Messages - <?php echo $roomname; ?></h2>



<div class="container">
  <div class = "anyclass">
  
  </div>
</div>




<input type = "text" class = "form-control" name="usermsg" id = "usermsg" placeholder = "Add message" ><br>
<button class = "button" name = "submitmsg" id = "submitmsg">Send</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script type = "text/javascript">

setInterval(runFunction, 1000);
function runFunction()
{
    $.post("content.php", {room:'<?php echo $roomname ?>'},
        function(data, status){
            document.getElementsByClassName('anyclass')[0].innerHTML = data;

        }
    
    
    )
}





var input = document.getElementById("usermsg");


input.addEventListener("keypress", function(event) {
  
  if (event.key === "Enter") {
    
    event.preventDefault();
    
    document.getElementById("submitmsg").click();
  }
});






    $('#submitmsg').click(function() {
    var clientmsg = $("#usermsg").val();

    $.post("postmsg.php", { text: clientmsg, room: '<?php echo $roomname ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>' },
        function(data, status) {
            document.getElementsByClassName('anyclass')[0].innerHTML = data;
        });
    
    $("#usermsg").val("");
    return false;
});

    
</script>
</body>
</html>