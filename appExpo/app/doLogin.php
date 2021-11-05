<? session_start();
include_once("includes.php");

$query = "SELECT * FROM user WHERE email='".$_POST['email']."'";
connectDB();
//$result=mysqli_query($_SESSION['db'],$query) or die ("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']));

$result=mysqli_query($_SESSION['db'],$query) or die ("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']));

closeDB();
	// $pw="Meatpie1";
	//echo "<br>".password_hash($pw,PASSWORD_DEFAULT)."<br><br><br>";
if(mysqli_num_rows($result)<1) {
	echo "No user found<br>";?>
<script>
		window.location.href = "login.php";
	</script>
	<?
	//header("Location:?link=404&e=noUser");
	//echo md5('Meatpie1');
	
	//	echo password_hash($pw,PASSWORD_DEFAULT)."<br>";
	//	echo password_hash($pw,PASSWORD_DEFAULT)."<br>";
	
	 ; 	
} else {
	$row = mysqli_fetch_assoc($result);
	//echo $row['pw']."<br>";
	// echo $_POST['pw'];
	
	if($_POST['pw']==$row['pw']) {
			//echo "Correct credentials. you are now logged in.<br><br>";
		$_SESSION['auth'] = true;
		$_SESSION['priv'] = $row['priv'];
		$_SESSION['userloginID']=$row['id'];
		$_SESSION['username']=$row['name'];
		header("Location:index.php");
	}
	else {
		//echo "Incorrect Credentials.<br><br>";
		?>
	<script>
		window.location.href = "login.php";
	</script>
	
		<?
	}
}



//var_dump($_POST);

?>