<? 
session_start();
include_once("includes.php");

$query= "UPDATE photos SET likes=likes+1 WHERE id='".$_GET['id']."' " ;
		
		connectDB();
$result=mysqli_query($_SESSION['db'],$query) or die ("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']));
		closeDB();


header("Location:index.php");
?>