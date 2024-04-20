
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Created</title>
    <style>
        @font-face {
            font-family: k2d-bold;
            src: url(K2D-Bold.ttf);
        }

        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
        }

        .center-text {
            max-width: 400px;
        }

        h1 {
            font-size: 3rem;
            color: #333;
            font-family: k2d-bold;
        }

        .button {
            background-color: #41C9E2;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Existing CSS styles */
        .image {
            width: 300px;
            height: 200px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['name']))
    $name = $_POST['name'];
else
    $name='';

if(isset($_POST['birth']))
    $birth = $_POST['birth'];
else
    $birth='';

if(isset($_POST['cin']))
    $cin = $_POST['cin'];
else
    $cin=0;
if(empty($cin))
    $cin='NULL';

if(isset($_POST['phone']))
    $phone = $_POST['phone'];
else
    $phone=0;

if(isset($_POST['gender']))
    $gender = $_POST['gender'];
else
    $gender='';

if(isset($_POST['state']))
    $state = $_POST['state'];
else
    $state='Tunis';

if(isset($_POST['pwd']))
    $pwd = $_POST['pwd'];
else
    $pwd='';

if(isset($_POST['email']))
    $email = $_POST['email'];
else
    $email='';

mysql_connect("localhost","root","");
mysql_select_db("tfarhed");
$req="select * from user where email='$email';";
$res=mysql_query($req);
if($res && mysql_num_rows($res) > 0 )
{
?>
<div class="container">
    <div class="center-text">
        <h1>User exist</h1>
        <a href="sign_up.html" class="button">Go back</a><br>
        <img src="sad.svg" alt="Image" class="image">
    </div>
</div>
<?php 
}
if($res && mysql_num_rows($res) <= 0 )
{
    $ins="insert into user values('$email','$name','$birth',$phone,'$gender','$state','$pwd',$cin);";
    $res_insert=mysql_query($ins);
    if($res_insert)
    {
?>

<div class="container">
    <div class="center-text">
        <h1>Welcome</h1>
        <a href="sign_in.html" class="button">Sign in</a><br>
        <img src="happy.svg" alt="Image" class="image">
    </div>
</div>
<?php
    }
    else
    {
?>
<div class="container">
    <div class="center-text">
        <h1>Inscription failed</h1>
        <a href="sign_up.html" class="button">Go back</a><br>
        <img src="sad.svg" alt="Image" class="image">
    </div>
</div>
<?php
    }
}
?>
</body>
</html>