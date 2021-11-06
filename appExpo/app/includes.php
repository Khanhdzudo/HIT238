<?
session_start();


function connectDB(){
	$db_username = "s328390_khanhdo";
	$db_password = "dzukhanh";
	$db_database = "s328390_238";
	$db_host = "localhost";

	$_SESSION['db'] = mysqli_connect(
	$db_host,
	$db_username,
	$db_password,
	$db_database);
	//Check connection
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL:" . mysqli_connect_error();	
	}
}
function closeDB(){
	mysqli_close($_SESSION['db']);  
}












function msg(){
	if ($_SESSION['msg']) {
		echo "<div class=\"bg-primary ";
		if ($_SESSION['msgType']=="success"){
			echo "success" ;	
		}elseif ($_SESSION['msgType']=="caution"){
			echo "caution";
		}
		else {echo "error";}
		
		echo "\">".$_SESSION['msg']."</div>";

			
	
	}
	$_SESSION['msg']="";
	
}




















function nav(){
	$query = "SELECT * FROM content WHERE navBarDisplay='y' && active = 'y' && priv<=".intval($_SESSION['priv'])."";
	connectDB();
	$result = mysqli_query($_SESSION['db'],$query);
	closeDB();	
	echo "<div class=\"row\"><div class=\""; echo ($_SESSION['auth'])?"col-md-12":"col-md-6";
	echo "\">";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<a class=\"btn btn-default\" href=\"?link=".$row['link']."\">".$row['navBarText']."</a>  ";	
	}
	//check if logged in
	if ($_SESSION['auth']) {
		echo "<a href=\"logout.php\" class=\"btn btn-default\">Log out</a>";
		
	}else { 
		//display login form
		
	?>
</div><div class="col-md-6">


<form class="form-inline" method="post" action="doLogin.php">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="pw" class="form-control" id="exampleInputPassword3" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default" name="submit" value="login">Sign in</button>
</form>

	
        	
	<? }
	
	echo "</div></div>";	
}



function auth($priv){
	
	if(!isset($_SESSION['priv'])){
		$_SESSION['priv']=0;
	}
	if ($priv>$_SESSION['priv']){
		header("Location: ?link=404&e=noAccess");	
	}else {
		if (!$_SESSION['accessTime']){
			$_SESSION['accessTime'] = time();
		}
		if ($priv>0) {
			
			$timeOut=500;
			if ($_SESSION['accessTime']<(time()-$timeOut)){

				header("Location: index.php?link=404&e=timeOut");
			}else {
				//all good
			
			}			
			
		}
	
		
	}
	
$_SESSION['accessTime']=time();		
	

	}
	
	
	
function siteStyles($input,$whatDoing){

$what[0] = "[b]"; $with[0] = "<strong>";

$what[1] = "[/b]"; $with[1] = "</strong>";

if($whatDoing == "in"){

$result = str_replace($what,$with,$input);

}else{

$result = str_replace($with,$what,$input);

}

return $result;

}

 

 

function curPageName() {

return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

}

function cleanInput($input) {

$search = array(

'@<script[^>]*?>.*?</script>@si', // Strip out javascript

'@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags

'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly

'@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments

);

$output = preg_replace($search, '', $input);

return $output;

}

 

function sanitize($input) {

connectDB();

if (is_array($input)) {

foreach($input as $var=>$val) {

$output[$var] = sanitize($val);

}

}

else {

if (get_magic_quotes_gpc()) {

$input = stripslashes($input);

}

$input = cleanInput($input);

$output = mysqli_real_escape_string ( $_SESSION['db'] , $input );

}

closeDB();

return $output;

}

 

function getUserIP()

{

// Get real visitor IP behind CloudFlare network

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {

$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

}

$client = @$_SERVER['HTTP_CLIENT_IP'];

$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

$remote = $_SERVER['REMOTE_ADDR'];

 

if(filter_var($client, FILTER_VALIDATE_IP))

{

$ip = $client;

}

elseif(filter_var($forward, FILTER_VALIDATE_IP))

{

$ip = $forward;

}

else

{

$ip = $remote;

}

 

return $ip;

}	


?>