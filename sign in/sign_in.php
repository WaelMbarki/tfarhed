
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
$email=$_POST["email"];
$pwd=$_POST["pwd"];
mysql_connect("localhost","root","");
mysql_select_db("tfarhed");
$req="select * from user where email='$email';";
$res=mysql_query($req);
if($res)
{
	if(mysql_num_rows($res)<=0)
	{
	?>
<div class="container">
    <div class="center-text">
        <h1>User not found</h1>
        <a href="sign_in.html" class="button">Go back</a><br>
        <img src="sad.svg" alt="Image" class="image">
    </div>
</div>
<?php	
	}
	else
	{
		$ligne=mysql_fetch_array($res);
		if($ligne["password"]!=$pwd)
		{
		?>
<div class="container">
    <div class="center-text">
        <h1>Password wrong</h1>
        <a href="sign_in.html" class="button">Go back</a><br>
        <img src="sad.svg" alt="Image" class="image">
    </div>
</div>
<?php
		}
		else
		{
		?>
<div class="container">
    <div class="center-text">
        <h1>Welcome Again</h1>
        <img src="profile.svg" alt="Image" class="image">
        <meta http-equiv="refresh" content="2;url=Home.html">
    </div>
</div>
<?php
		}
	}
}
else
{
?>
<div class="container">
    <div class="center-text">
        <h1>Erreur 404!</h1>
        <a href="sign_in.html" class="button">Go back</a><br>
        <img src="sad.svg" alt="Image" class="image">
        <meta http-equiv="refresh" content="2;url=sign_in.html">
    </div>
</div>
<?php
}
?>
</body>
</html>