<? 
include("includes.php");

if ($_POST['submit']=="CreateNewUser")
	{
$query= "INSERT INTO user (email, pw, name, phone) VALUES ('".$_POST['inputEmail']."','".$_POST['inputPassword']."','".$_POST['name']."','".$_POST['phone']."')";

		connectDB();
$result=mysqli_query($_SESSION['db'],$query) or die ("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']));
		closeDB();
		
		$sucess="1";
		$_SESSION['msg']="User Created";
		$_SESSION['msgType']="success";
	
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Khanh Dzu Do - S328390">
    <meta name="generator" content="Khanh Dzu Do - S328390">
    <title>NT Photography Social Network</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

	  
	  <form method="post" action="<?=$_SERVER['php_self'];?>" id="userManagement" class="form-signin" enctype="multipart/form-data">
 NT Photography User
  <h1 class="h3 mb-3 font-weight-normal">Register New User</h1>
	 <? if ($sucess<>1) { ?>		  
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address"  autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" >
  <label for="inputPassword" class="sr-only">Your Name</label>
  <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" >
  <label for="inputPassword" class="sr-only">Phone number</label>
  <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" >
  <br>


<button type="submit" name="submit" value="CreateNewUser" class="btn btn-lg btn-primary btn-block" > Register </button> 		  
		    <? } else { echo "You have registed successfully !";  ?>
		  
		    <p><a class="btn btn-primary btn-lg" href="#" role="button"  onclick="location.href='index.php'">Go to Homepage &raquo;</a></p>
		   <p><a class="btn btn-primary btn-lg" href="#" role="button"  onclick="location.href='login.php'">Login Page &raquo;</a></p>
		  
		  <? }?>
		  
		  
		  
  <p class="mt-5 mb-3 text-muted">Khanh Dzu Do - S328390 - 2021</p>
</form> 
	
	  
	  
	  
</body>
</html>
