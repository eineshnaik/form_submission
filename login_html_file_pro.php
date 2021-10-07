<?php
$name_error="";
$email_error="";
$gender_error="";
$website_error="";


if(isset($_POST["submit"]))                    //submit
{
	if(empty($_POST["name"]))                  //name
	{
		$name_error="name is required";
	}
	else
	{
		$name=Test_user_input($_POST["name"]);
		if(!preg_match("/^[A-Za-z\. ]*$/",$name))
		{
			$name_error="only letters and white space are allowed";
		}
	}

	if(empty($_POST["email"]))                 //email
	{
		$email_error="email is required";
	}
	else
	{
		$email=Test_user_input($_POST["email"]);
		if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email))
		{
			$email_error="invalid email format";
		}
	}

    if(empty($_POST["gender"]))               //gender
    {
    	$gender_error="gender is required";
    }
    else
    {
    	$gender=Test_user_input($_POST["gender"]);
    }
	
	if(empty($_POST["website"]))              //website
	{
		$website_error="website is required";
	}
	else
	{
		$website=Test_user_input($_POST["website"]);
		if(!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$website))
		{
			$website_error="invalid website address format";
		}
	}

	if(!empty($_POST["name"])&& !empty($_POST["email"]) && !empty($_POST["gender"]) && !empty($_POST["website"]))
	{   if((preg_match("/^[A-Za-z\. ]*$/",$name)==true) && (preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email)==true) && (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$website)==true))
        {
	        echo "<h2>Your Submit Information</h2><br>";
	        echo "Name: {$_POST["name"]}<br>";
	        echo "E-mail: {$_POST["email"]}<br>";
	        echo "Gender: {$_POST["gender"]}<br>";
	        echo "website: {$_POST["website"]}<br>";
	        echo "Comment: {$_POST["comment"]}<br>";
	    }
	    else
	    {
	    	echo '<span class="error">please enter correct details and submit again</span>';
	    }
    }
}

function Test_user_input($data)
{
	return $data;
}




?>





<html>
<head>
<title>login_html_file_pro</title>
</head>
<style type="text/css">
input[type="text"],input[type="email"],textarea{
        border: 1px solid dashed;
        background-color: rgb(221,216,212);
        width: 600px;
        padding: .5em;
        font-size: 1.0em;
}
.error{
	color: red;
}
</style>


<body>
    <form action="login_html_file_pro.php" method="POST">
    	<fieldset>
    		Name:<br>
    		<input class="input" type="text" name="name" />*<span class="error"><?php echo $name_error; ?></span><br>
    		E-mail:<br>
    		<input class="input" type="text" name="email" />*<span class="error"><?php echo $email_error; ?></span><br>
    		Gender:<br>
    		<input class="input" type="radio" name="gender" value="female" />Female
    		<input class="input" type="radio" name="gender" value="male" />Male *<span class="error"><?php echo $gender_error; ?></span><br>
    		Website:<br>
    		<input class="input" type="text" name="website" />*<span class="error"><?php echo $website_error; ?></span><br>
    		Comment:<br>
    		<textarea name="comment" rows="5" cols="25"></textarea><br>
    		<input type="submit" name="submit" value="submit" />
    	</fieldset>

</body>


</html>