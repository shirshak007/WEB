
<head>
<link rel="icon" href="img/logo.png" type="image" sizes="16x16">
<title>Medicinal Garden | Login</title>
<meta charset="UTF-8">
<link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
    src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"
    crossorigin="anonymous"
  ></script>
    <!-- Some css goes here -->
<style>


body {
    font-family: tahoma, helvetica, arial, sans-serif;
    font-size: 16px; 
    color: #ddd4d4;
    padding-top: 12px;
    line-height: 2;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 1;
    filter:alpha(opacity=80);
}


nav{
float:left;
max-width:300px;
margin:0;
padding:1em;
}


input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4Db0E6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45b67f;
}


input[type=submit]:hover {
    background-color: #45b67f;
	

}
#mydiv {
    display: inline-block;
    position:fixed;
    color:black;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 50%;
    height: 50%;
    margin: auto;
}
a{
    text-decoration:none;
    color:white;
    }
    a:hover
    {
        text-decoration:none;
    color:yellow;
    }
</style>
</head>
<body>
<?php
session_start();
if($_SESSION==TRUE)
header('Location:uhome.php');
else
?>

<div class="navbar bg-dark"><div class="navbar-brand"><a href="index.php"><img src="assets/icon/logo.png" height="30px" width="30px" alt="logo">
        MEDICINAL NURSERY</a></div></div>
<div id="mydiv">
<form action="AdminLoginCheck.php" method=post>
ID/Email<input type=text name=id>

Password<input type=password name=pwd>
<br><br>
<input type=submit value=Login>
<p align=right><a href="forgot.php">Forgot Password?</a></p>

</form>
<div>

</body>



